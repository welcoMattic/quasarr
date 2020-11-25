<?php

namespace TMDB\API\Normalizer;

use TMDB\API\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    protected $normalizers = array('TMDB\\API\\Model\\MovieListObject' => 'TMDB\\API\\Normalizer\\MovieListObjectNormalizer', 'TMDB\\API\\Model\\TvListResultObject' => 'TMDB\\API\\Normalizer\\TvListResultObjectNormalizer', 'TMDB\\API\\Model\\SearchMovieGetResponse200' => 'TMDB\\API\\Normalizer\\SearchMovieGetResponse200Normalizer', 'TMDB\\API\\Model\\SearchMovieGetResponse401' => 'TMDB\\API\\Normalizer\\SearchMovieGetResponse401Normalizer', 'TMDB\\API\\Model\\SearchMovieGetResponse404' => 'TMDB\\API\\Normalizer\\SearchMovieGetResponse404Normalizer', 'TMDB\\API\\Model\\SearchTvGetResponse200' => 'TMDB\\API\\Normalizer\\SearchTvGetResponse200Normalizer', 'TMDB\\API\\Model\\SearchTvGetResponse401' => 'TMDB\\API\\Normalizer\\SearchTvGetResponse401Normalizer', 'TMDB\\API\\Model\\SearchTvGetResponse404' => 'TMDB\\API\\Normalizer\\SearchTvGetResponse404Normalizer', 'TMDB\\API\\Model\\MoviePopularGetResponse200' => 'TMDB\\API\\Normalizer\\MoviePopularGetResponse200Normalizer', 'TMDB\\API\\Model\\MoviePopularGetResponse401' => 'TMDB\\API\\Normalizer\\MoviePopularGetResponse401Normalizer', 'TMDB\\API\\Model\\MoviePopularGetResponse404' => 'TMDB\\API\\Normalizer\\MoviePopularGetResponse404Normalizer', 'TMDB\\API\\Model\\TvPopularGetResponse200' => 'TMDB\\API\\Normalizer\\TvPopularGetResponse200Normalizer', 'TMDB\\API\\Model\\TvPopularGetResponse401' => 'TMDB\\API\\Normalizer\\TvPopularGetResponse401Normalizer', 'TMDB\\API\\Model\\TvPopularGetResponse404' => 'TMDB\\API\\Normalizer\\TvPopularGetResponse404Normalizer', 'TMDB\\API\\Model\\MovieMovieIdGetResponse200' => 'TMDB\\API\\Normalizer\\MovieMovieIdGetResponse200Normalizer', 'TMDB\\API\\Model\\MovieMovieIdGetResponse200GenresItem' => 'TMDB\\API\\Normalizer\\MovieMovieIdGetResponse200GenresItemNormalizer', 'TMDB\\API\\Model\\MovieMovieIdGetResponse200ProductionCompaniesItem' => 'TMDB\\API\\Normalizer\\MovieMovieIdGetResponse200ProductionCompaniesItemNormalizer', 'TMDB\\API\\Model\\MovieMovieIdGetResponse200ProductionCountriesItem' => 'TMDB\\API\\Normalizer\\MovieMovieIdGetResponse200ProductionCountriesItemNormalizer', 'TMDB\\API\\Model\\MovieMovieIdGetResponse200SpokenLanguagesItem' => 'TMDB\\API\\Normalizer\\MovieMovieIdGetResponse200SpokenLanguagesItemNormalizer', 'TMDB\\API\\Model\\MovieMovieIdGetResponse401' => 'TMDB\\API\\Normalizer\\MovieMovieIdGetResponse401Normalizer', 'TMDB\\API\\Model\\MovieMovieIdGetResponse404' => 'TMDB\\API\\Normalizer\\MovieMovieIdGetResponse404Normalizer', 'TMDB\\API\\Model\\TvTvIdGetResponse200' => 'TMDB\\API\\Normalizer\\TvTvIdGetResponse200Normalizer', 'TMDB\\API\\Model\\TvTvIdGetResponse200CreatedByItem' => 'TMDB\\API\\Normalizer\\TvTvIdGetResponse200CreatedByItemNormalizer', 'TMDB\\API\\Model\\TvTvIdGetResponse200GenresItem' => 'TMDB\\API\\Normalizer\\TvTvIdGetResponse200GenresItemNormalizer', 'TMDB\\API\\Model\\TvTvIdGetResponse200LastEpisodeToAir' => 'TMDB\\API\\Normalizer\\TvTvIdGetResponse200LastEpisodeToAirNormalizer', 'TMDB\\API\\Model\\TvTvIdGetResponse200NetworksItem' => 'TMDB\\API\\Normalizer\\TvTvIdGetResponse200NetworksItemNormalizer', 'TMDB\\API\\Model\\TvTvIdGetResponse200ProductionCompaniesItem' => 'TMDB\\API\\Normalizer\\TvTvIdGetResponse200ProductionCompaniesItemNormalizer', 'TMDB\\API\\Model\\TvTvIdGetResponse200SeasonsItem' => 'TMDB\\API\\Normalizer\\TvTvIdGetResponse200SeasonsItemNormalizer', 'TMDB\\API\\Model\\TvTvIdGetResponse401' => 'TMDB\\API\\Normalizer\\TvTvIdGetResponse401Normalizer', 'TMDB\\API\\Model\\TvTvIdGetResponse404' => 'TMDB\\API\\Normalizer\\TvTvIdGetResponse404Normalizer', 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200' => 'TMDB\\API\\Normalizer\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200Normalizer', 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItem' => 'TMDB\\API\\Normalizer\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItemNormalizer', 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200GuestStarsItem' => 'TMDB\\API\\Normalizer\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200GuestStarsItemNormalizer', 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse401' => 'TMDB\\API\\Normalizer\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse401Normalizer', 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse404' => 'TMDB\\API\\Normalizer\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse404Normalizer', '\\Jane\\JsonSchemaRuntime\\Reference' => '\\TMDB\\API\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null)
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
}