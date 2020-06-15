<?php

namespace Quasarr\MessageHandler;

use Doctrine\Persistence\ManagerRegistry;
use Quasarr\Enum\ResourceStatus;
use Quasarr\Message\StoreMovieMessage;
use Quasarr\Repository\MovieRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class StoreMovieMessageHandler implements MessageHandlerInterface
{
    private $doctrine;
    private $movieRepository;
    private $destinationDir = '/library/movies';

    public function __construct(ManagerRegistry $doctrine, MovieRepository $movieRepository)
    {
        $this->doctrine = $doctrine;
        $this->movieRepository = $movieRepository;
    }

    public function __invoke(StoreMovieMessage $message)
    {
        $movie = $this->movieRepository->find($message->getMovieId());

        if (link($message->getFilepath(), sprintf('%s/%s', $this->destinationDir, basename($message->getFilepath())))) {
            $movie->setStatus(ResourceStatus::PROCESSED);
            $this->doctrine->getManager()->flush();
        }

        // @todo: log failure
    }
}
