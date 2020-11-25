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
class TvTvIdGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'TMDB\\API\\Model\\TvTvIdGetResponse200';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'TMDB\\API\\Model\\TvTvIdGetResponse200';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \TMDB\API\Model\TvTvIdGetResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('backdrop_path', $data) && $data['backdrop_path'] !== null) {
            $object->setBackdropPath($data['backdrop_path']);
        }
        elseif (\array_key_exists('backdrop_path', $data) && $data['backdrop_path'] === null) {
            $object->setBackdropPath(null);
        }
        if (\array_key_exists('created_by', $data)) {
            $values = array();
            foreach ($data['created_by'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'TMDB\\API\\Model\\TvTvIdGetResponse200CreatedByItem', 'json', $context);
            }
            $object->setCreatedBy($values);
        }
        if (\array_key_exists('episode_run_time', $data)) {
            $values_1 = array();
            foreach ($data['episode_run_time'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setEpisodeRunTime($values_1);
        }
        if (\array_key_exists('genres', $data)) {
            $values_2 = array();
            foreach ($data['genres'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'TMDB\\API\\Model\\TvTvIdGetResponse200GenresItem', 'json', $context);
            }
            $object->setGenres($values_2);
        }
        if (\array_key_exists('homepage', $data)) {
            $object->setHomepage($data['homepage']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('in_production', $data)) {
            $object->setInProduction($data['in_production']);
        }
        if (\array_key_exists('languages', $data)) {
            $values_3 = array();
            foreach ($data['languages'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setLanguages($values_3);
        }
        if (\array_key_exists('last_air_date', $data) && $data['last_air_date'] !== null) {
            $object->setLastAirDate(\DateTime::createFromFormat('Y-m-d', $data['last_air_date'])->setTime(0, 0, 0));
        }
        elseif (\array_key_exists('last_air_date', $data) && $data['last_air_date'] === null) {
            $object->setLastAirDate(null);
        }
        if (\array_key_exists('last_episode_to_air', $data)) {
            $object->setLastEpisodeToAir($this->denormalizer->denormalize($data['last_episode_to_air'], 'TMDB\\API\\Model\\TvTvIdGetResponse200LastEpisodeToAir', 'json', $context));
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('networks', $data)) {
            $values_4 = array();
            foreach ($data['networks'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, 'TMDB\\API\\Model\\TvTvIdGetResponse200NetworksItem', 'json', $context);
            }
            $object->setNetworks($values_4);
        }
        if (\array_key_exists('number_of_episodes', $data)) {
            $object->setNumberOfEpisodes($data['number_of_episodes']);
        }
        if (\array_key_exists('number_of_seasons', $data)) {
            $object->setNumberOfSeasons($data['number_of_seasons']);
        }
        if (\array_key_exists('origin_country', $data)) {
            $values_5 = array();
            foreach ($data['origin_country'] as $value_5) {
                $values_5[] = $value_5;
            }
            $object->setOriginCountry($values_5);
        }
        if (\array_key_exists('original_language', $data)) {
            $object->setOriginalLanguage($data['original_language']);
        }
        if (\array_key_exists('original_name', $data)) {
            $object->setOriginalName($data['original_name']);
        }
        if (\array_key_exists('overview', $data)) {
            $object->setOverview($data['overview']);
        }
        if (\array_key_exists('popularity', $data)) {
            $object->setPopularity($data['popularity']);
        }
        if (\array_key_exists('poster_path', $data) && $data['poster_path'] !== null) {
            $object->setPosterPath($data['poster_path']);
        }
        elseif (\array_key_exists('poster_path', $data) && $data['poster_path'] === null) {
            $object->setPosterPath(null);
        }
        if (\array_key_exists('production_companies', $data)) {
            $values_6 = array();
            foreach ($data['production_companies'] as $value_6) {
                $values_6[] = $this->denormalizer->denormalize($value_6, 'TMDB\\API\\Model\\TvTvIdGetResponse200ProductionCompaniesItem', 'json', $context);
            }
            $object->setProductionCompanies($values_6);
        }
        if (\array_key_exists('seasons', $data)) {
            $values_7 = array();
            foreach ($data['seasons'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, 'TMDB\\API\\Model\\TvTvIdGetResponse200SeasonsItem', 'json', $context);
            }
            $object->setSeasons($values_7);
        }
        if (\array_key_exists('status', $data)) {
            $object->setStatus($data['status']);
        }
        if (\array_key_exists('type', $data)) {
            $object->setType($data['type']);
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
        if (null !== $object->getBackdropPath()) {
            $data['backdrop_path'] = $object->getBackdropPath();
        }
        if (null !== $object->getCreatedBy()) {
            $values = array();
            foreach ($object->getCreatedBy() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['created_by'] = $values;
        }
        if (null !== $object->getEpisodeRunTime()) {
            $values_1 = array();
            foreach ($object->getEpisodeRunTime() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['episode_run_time'] = $values_1;
        }
        if (null !== $object->getGenres()) {
            $values_2 = array();
            foreach ($object->getGenres() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['genres'] = $values_2;
        }
        if (null !== $object->getHomepage()) {
            $data['homepage'] = $object->getHomepage();
        }
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getInProduction()) {
            $data['in_production'] = $object->getInProduction();
        }
        if (null !== $object->getLanguages()) {
            $values_3 = array();
            foreach ($object->getLanguages() as $value_3) {
                $values_3[] = $value_3;
            }
            $data['languages'] = $values_3;
        }
        if (null !== $object->getLastAirDate()) {
            $data['last_air_date'] = $object->getLastAirDate()->format('Y-m-d');
        }
        if (null !== $object->getLastEpisodeToAir()) {
            $data['last_episode_to_air'] = $this->normalizer->normalize($object->getLastEpisodeToAir(), 'json', $context);
        }
        if (null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if (null !== $object->getNetworks()) {
            $values_4 = array();
            foreach ($object->getNetworks() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data['networks'] = $values_4;
        }
        if (null !== $object->getNumberOfEpisodes()) {
            $data['number_of_episodes'] = $object->getNumberOfEpisodes();
        }
        if (null !== $object->getNumberOfSeasons()) {
            $data['number_of_seasons'] = $object->getNumberOfSeasons();
        }
        if (null !== $object->getOriginCountry()) {
            $values_5 = array();
            foreach ($object->getOriginCountry() as $value_5) {
                $values_5[] = $value_5;
            }
            $data['origin_country'] = $values_5;
        }
        if (null !== $object->getOriginalLanguage()) {
            $data['original_language'] = $object->getOriginalLanguage();
        }
        if (null !== $object->getOriginalName()) {
            $data['original_name'] = $object->getOriginalName();
        }
        if (null !== $object->getOverview()) {
            $data['overview'] = $object->getOverview();
        }
        if (null !== $object->getPopularity()) {
            $data['popularity'] = $object->getPopularity();
        }
        if (null !== $object->getPosterPath()) {
            $data['poster_path'] = $object->getPosterPath();
        }
        if (null !== $object->getProductionCompanies()) {
            $values_6 = array();
            foreach ($object->getProductionCompanies() as $value_6) {
                $values_6[] = $this->normalizer->normalize($value_6, 'json', $context);
            }
            $data['production_companies'] = $values_6;
        }
        if (null !== $object->getSeasons()) {
            $values_7 = array();
            foreach ($object->getSeasons() as $value_7) {
                $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $data['seasons'] = $values_7;
        }
        if (null !== $object->getStatus()) {
            $data['status'] = $object->getStatus();
        }
        if (null !== $object->getType()) {
            $data['type'] = $object->getType();
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