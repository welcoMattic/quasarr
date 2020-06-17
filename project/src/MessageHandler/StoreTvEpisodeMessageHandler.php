<?php

namespace Quasarr\MessageHandler;

use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
use Quasarr\Enum\ResourceStatus;
use Quasarr\Message\StoreTvEpisodeMessage;
use Quasarr\Repository\TvEpisodeRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class StoreTvEpisodeMessageHandler implements MessageHandlerInterface
{
    private $doctrine;
    private $tvEpisodeRepository;
    private $logger;
    private $destinationDir = '/library/tv';

    public function __construct(ManagerRegistry $doctrine,
        TvEpisodeRepository $tvEpisodeRepository,
        LoggerInterface $logger)
    {
        $this->doctrine = $doctrine;
        $this->tvEpisodeRepository = $tvEpisodeRepository;
        $this->logger = $logger;
    }

    public function __invoke(StoreTvEpisodeMessage $message)
    {
        $tvEpisode = $this->tvEpisodeRepository->find($message->getTvEpisodeId());
        $tvShowName = $tvEpisode->getShow()->getTitle();
        $tvShowSeasonNumber = sprintf('%s %s', 'Saison', str_pad($tvEpisode->getSeason()->getNumber(), 2, '0', STR_PAD_LEFT));
        $tvSeasonDirectoryPath = sprintf('%s/%s/%s', $this->destinationDir, $tvShowName, $tvShowSeasonNumber);

        if (!is_dir($tvSeasonDirectoryPath)) {
            mkdir($tvSeasonDirectoryPath, 0777, true);
        }

        $destinationPath = sprintf('%s/%s', $tvSeasonDirectoryPath, basename($message->getFilepath()));

        if (link($message->getFilepath(), $destinationPath)) {
            $tvEpisode->setStatus(ResourceStatus::PROCESSED);
            // @todo: if last episode of season, set season processed
            $this->doctrine->getManager()->flush();
        }

        // @todo: log failure
    }
}
