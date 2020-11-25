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
class TvTvIdGetResponse200SeasonsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'TMDB\\API\\Model\\TvTvIdGetResponse200SeasonsItem';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'TMDB\\API\\Model\\TvTvIdGetResponse200SeasonsItem';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \TMDB\API\Model\TvTvIdGetResponse200SeasonsItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('air_date', $data) && $data['air_date'] !== null) {
            $object->setAirDate(\DateTime::createFromFormat('Y-m-d', $data['air_date'])->setTime(0, 0, 0));
        }
        elseif (\array_key_exists('air_date', $data) && $data['air_date'] === null) {
            $object->setAirDate(null);
        }
        if (\array_key_exists('episode_count', $data)) {
            $object->setEpisodeCount($data['episode_count']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('overview', $data)) {
            $object->setOverview($data['overview']);
        }
        if (\array_key_exists('poster_path', $data) && $data['poster_path'] !== null) {
            $object->setPosterPath($data['poster_path']);
        }
        elseif (\array_key_exists('poster_path', $data) && $data['poster_path'] === null) {
            $object->setPosterPath(null);
        }
        if (\array_key_exists('season_number', $data)) {
            $object->setSeasonNumber($data['season_number']);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getAirDate()) {
            $data['air_date'] = $object->getAirDate()->format('Y-m-d');
        }
        if (null !== $object->getEpisodeCount()) {
            $data['episode_count'] = $object->getEpisodeCount();
        }
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if (null !== $object->getOverview()) {
            $data['overview'] = $object->getOverview();
        }
        if (null !== $object->getPosterPath()) {
            $data['poster_path'] = $object->getPosterPath();
        }
        if (null !== $object->getSeasonNumber()) {
            $data['season_number'] = $object->getSeasonNumber();
        }
        return $data;
    }
}