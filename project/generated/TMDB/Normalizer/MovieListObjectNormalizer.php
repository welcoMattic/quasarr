<?php

namespace TMDB\API\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use TMDB\API\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class MovieListObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'TMDB\\API\\Model\\MovieListObject';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'TMDB\\API\\Model\\MovieListObject';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \TMDB\API\Model\MovieListObject();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('poster_path', $data) && $data['poster_path'] !== null) {
            $object->setPosterPath($data['poster_path']);
        }
        elseif (\array_key_exists('poster_path', $data) && $data['poster_path'] === null) {
            $object->setPosterPath(null);
        }
        if (\array_key_exists('adult', $data)) {
            $object->setAdult($data['adult']);
        }
        if (\array_key_exists('overview', $data)) {
            $object->setOverview($data['overview']);
        }
        if (\array_key_exists('release_date', $data)) {
            $object->setReleaseDate($data['release_date']);
        }
        if (\array_key_exists('genre_ids', $data)) {
            $values = array();
            foreach ($data['genre_ids'] as $value) {
                $values[] = $value;
            }
            $object->setGenreIds($values);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('original_title', $data)) {
            $object->setOriginalTitle($data['original_title']);
        }
        if (\array_key_exists('original_language', $data)) {
            $object->setOriginalLanguage($data['original_language']);
        }
        if (\array_key_exists('title', $data)) {
            $object->setTitle($data['title']);
        }
        if (\array_key_exists('backdrop_path', $data) && $data['backdrop_path'] !== null) {
            $object->setBackdropPath($data['backdrop_path']);
        }
        elseif (\array_key_exists('backdrop_path', $data) && $data['backdrop_path'] === null) {
            $object->setBackdropPath(null);
        }
        if (\array_key_exists('popularity', $data)) {
            $object->setPopularity($data['popularity']);
        }
        if (\array_key_exists('vote_count', $data)) {
            $object->setVoteCount($data['vote_count']);
        }
        if (\array_key_exists('video', $data)) {
            $object->setVideo($data['video']);
        }
        if (\array_key_exists('vote_average', $data)) {
            $object->setVoteAverage($data['vote_average']);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getPosterPath()) {
            $data['poster_path'] = $object->getPosterPath();
        }
        if (null !== $object->getAdult()) {
            $data['adult'] = $object->getAdult();
        }
        if (null !== $object->getOverview()) {
            $data['overview'] = $object->getOverview();
        }
        if (null !== $object->getReleaseDate()) {
            $data['release_date'] = $object->getReleaseDate();
        }
        if (null !== $object->getGenreIds()) {
            $values = array();
            foreach ($object->getGenreIds() as $value) {
                $values[] = $value;
            }
            $data['genre_ids'] = $values;
        }
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getOriginalTitle()) {
            $data['original_title'] = $object->getOriginalTitle();
        }
        if (null !== $object->getOriginalLanguage()) {
            $data['original_language'] = $object->getOriginalLanguage();
        }
        if (null !== $object->getTitle()) {
            $data['title'] = $object->getTitle();
        }
        if (null !== $object->getBackdropPath()) {
            $data['backdrop_path'] = $object->getBackdropPath();
        }
        if (null !== $object->getPopularity()) {
            $data['popularity'] = $object->getPopularity();
        }
        if (null !== $object->getVoteCount()) {
            $data['vote_count'] = $object->getVoteCount();
        }
        if (null !== $object->getVideo()) {
            $data['video'] = $object->getVideo();
        }
        if (null !== $object->getVoteAverage()) {
            $data['vote_average'] = $object->getVoteAverage();
        }
        return $data;
    }
}