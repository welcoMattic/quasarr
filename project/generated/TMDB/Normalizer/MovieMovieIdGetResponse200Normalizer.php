<?php

namespace TMDB\API\Normalizer;

use Jane\JsonSchemaRuntime\Normalizer\CheckArray;
use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class MovieMovieIdGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'TMDB\\API\\Model\\MovieMovieIdGetResponse200';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'TMDB\\API\\Model\\MovieMovieIdGetResponse200';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \TMDB\API\Model\MovieMovieIdGetResponse200();
        if (\array_key_exists('adult', $data)) {
            $object->setAdult($data['adult']);
        }
        if (\array_key_exists('backdrop_path', $data) && $data['backdrop_path'] !== null) {
            $object->setBackdropPath($data['backdrop_path']);
        } elseif (\array_key_exists('backdrop_path', $data) && $data['backdrop_path'] === null) {
            $object->setBackdropPath(null);
        }
        if (\array_key_exists('budget', $data)) {
            $object->setBudget($data['budget']);
        }
        if (\array_key_exists('genres', $data)) {
            $values = [];
            foreach ($data['genres'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'TMDB\\API\\Model\\MovieMovieIdGetResponse200GenresItem', 'json', $context);
            }
            $object->setGenres($values);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('original_language', $data)) {
            $object->setOriginalLanguage($data['original_language']);
        }
        if (\array_key_exists('original_title', $data)) {
            $object->setOriginalTitle($data['original_title']);
        }
        if (\array_key_exists('popularity', $data)) {
            $object->setPopularity($data['popularity']);
        }
        if (\array_key_exists('poster_path', $data) && $data['poster_path'] !== null) {
            $object->setPosterPath($data['poster_path']);
        } elseif (\array_key_exists('poster_path', $data) && $data['poster_path'] === null) {
            $object->setPosterPath(null);
        }
        if (\array_key_exists('production_companies', $data)) {
            $values_1 = [];
            foreach ($data['production_companies'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'TMDB\\API\\Model\\MovieMovieIdGetResponse200ProductionCompaniesItem', 'json', $context);
            }
            $object->setProductionCompanies($values_1);
        }
        if (\array_key_exists('production_countries', $data)) {
            $values_2 = [];
            foreach ($data['production_countries'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'TMDB\\API\\Model\\MovieMovieIdGetResponse200ProductionCountriesItem', 'json', $context);
            }
            $object->setProductionCountries($values_2);
        }
        if (\array_key_exists('release_date', $data)) {
            $object->setReleaseDate(\DateTime::createFromFormat('Y-m-d', $data['release_date'])->setTime(0, 0, 0));
        }
        if (\array_key_exists('revenue', $data)) {
            $object->setRevenue($data['revenue']);
        }
        if (\array_key_exists('spoken_languages', $data)) {
            $values_3 = [];
            foreach ($data['spoken_languages'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'TMDB\\API\\Model\\MovieMovieIdGetResponse200SpokenLanguagesItem', 'json', $context);
            }
            $object->setSpokenLanguages($values_3);
        }
        if (\array_key_exists('status', $data)) {
            $object->setStatus($data['status']);
        }
        if (\array_key_exists('title', $data)) {
            $object->setTitle($data['title']);
        }
        if (\array_key_exists('video', $data)) {
            $object->setVideo($data['video']);
        }
        if (\array_key_exists('vote_average', $data)) {
            $object->setVoteAverage($data['vote_average']);
        }
        if (\array_key_exists('vote_count', $data)) {
            $object->setVoteCount($data['vote_count']);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getAdult()) {
            $data['adult'] = $object->getAdult();
        }
        $data['backdrop_path'] = $object->getBackdropPath();
        if (null !== $object->getBudget()) {
            $data['budget'] = $object->getBudget();
        }
        if (null !== $object->getGenres()) {
            $values = [];
            foreach ($object->getGenres() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['genres'] = $values;
        }
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getOriginalLanguage()) {
            $data['original_language'] = $object->getOriginalLanguage();
        }
        if (null !== $object->getOriginalTitle()) {
            $data['original_title'] = $object->getOriginalTitle();
        }
        if (null !== $object->getPopularity()) {
            $data['popularity'] = $object->getPopularity();
        }
        $data['poster_path'] = $object->getPosterPath();
        if (null !== $object->getProductionCompanies()) {
            $values_1 = [];
            foreach ($object->getProductionCompanies() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['production_companies'] = $values_1;
        }
        if (null !== $object->getProductionCountries()) {
            $values_2 = [];
            foreach ($object->getProductionCountries() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['production_countries'] = $values_2;
        }
        if (null !== $object->getReleaseDate()) {
            $data['release_date'] = $object->getReleaseDate()->format('Y-m-d');
        }
        if (null !== $object->getRevenue()) {
            $data['revenue'] = $object->getRevenue();
        }
        if (null !== $object->getSpokenLanguages()) {
            $values_3 = [];
            foreach ($object->getSpokenLanguages() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['spoken_languages'] = $values_3;
        }
        if (null !== $object->getStatus()) {
            $data['status'] = $object->getStatus();
        }
        if (null !== $object->getTitle()) {
            $data['title'] = $object->getTitle();
        }
        if (null !== $object->getVideo()) {
            $data['video'] = $object->getVideo();
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
