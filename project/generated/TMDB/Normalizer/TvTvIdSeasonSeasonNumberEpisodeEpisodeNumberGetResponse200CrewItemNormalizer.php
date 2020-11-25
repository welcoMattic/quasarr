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
class TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItem';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItem';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \TMDB\API\Model\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('credit_id', $data)) {
            $object->setCreditId($data['credit_id']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('department', $data)) {
            $object->setDepartment($data['department']);
        }
        if (\array_key_exists('job', $data)) {
            $object->setJob($data['job']);
        }
        if (\array_key_exists('profile_path', $data) && $data['profile_path'] !== null) {
            $object->setProfilePath($data['profile_path']);
        }
        elseif (\array_key_exists('profile_path', $data) && $data['profile_path'] === null) {
            $object->setProfilePath(null);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getCreditId()) {
            $data['credit_id'] = $object->getCreditId();
        }
        if (null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if (null !== $object->getDepartment()) {
            $data['department'] = $object->getDepartment();
        }
        if (null !== $object->getJob()) {
            $data['job'] = $object->getJob();
        }
        if (null !== $object->getProfilePath()) {
            $data['profile_path'] = $object->getProfilePath();
        }
        return $data;
    }
}