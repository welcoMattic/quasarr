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
class TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \TMDB\API\Model\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('air_date', $data) && $data['air_date'] !== null) {
            $object->setAirDate(\DateTime::createFromFormat('Y-m-d', $data['air_date'])->setTime(0, 0, 0));
        }
        elseif (\array_key_exists('air_date', $data) && $data['air_date'] === null) {
            $object->setAirDate(null);
        }
        if (\array_key_exists('crew', $data)) {
            $values = array();
            foreach ($data['crew'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItem', 'json', $context);
            }
            $object->setCrew($values);
        }
        if (\array_key_exists('episode_number', $data)) {
            $object->setEpisodeNumber($data['episode_number']);
        }
        if (\array_key_exists('guest_stars', $data)) {
            $values_1 = array();
            foreach ($data['guest_stars'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200GuestStarsItem', 'json', $context);
            }
            $object->setGuestStars($values_1);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('overview', $data)) {
            $object->setOverview($data['overview']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('season_number', $data)) {
            $object->setSeasonNumber($data['season_number']);
        }
        if (\array_key_exists('still_path', $data) && $data['still_path'] !== null) {
            $object->setStillPath($data['still_path']);
        }
        elseif (\array_key_exists('still_path', $data) && $data['still_path'] === null) {
            $object->setStillPath(null);
        }
        if (\array_key_exists('vote_average', $data)) {
            $object->setVoteAverage($data['vote_average']);
        }
        if (\array_key_exists('vote_count', $data)) {
            $object->setVoteCount($data['vote_count']);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getAirDate()) {
            $data['air_date'] = $object->getAirDate()->format('Y-m-d');
        }
        if (null !== $object->getCrew()) {
            $values = array();
            foreach ($object->getCrew() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['crew'] = $values;
        }
        if (null !== $object->getEpisodeNumber()) {
            $data['episode_number'] = $object->getEpisodeNumber();
        }
        if (null !== $object->getGuestStars()) {
            $values_1 = array();
            foreach ($object->getGuestStars() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['guest_stars'] = $values_1;
        }
        if (null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if (null !== $object->getOverview()) {
            $data['overview'] = $object->getOverview();
        }
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getSeasonNumber()) {
            $data['season_number'] = $object->getSeasonNumber();
        }
        if (null !== $object->getStillPath()) {
            $data['still_path'] = $object->getStillPath();
        }
        if (null !== $object->getVoteAverage()) {
            $data['vote_average'] = $object->getVoteAverage();
        }
        if (null !== $object->getVoteCount()) {
            $data['vote_count'] = $object->getVoteCount();
        }
        return $data;
    }
}