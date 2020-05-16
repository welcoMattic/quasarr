<?php

namespace Quasarr\MessageHandler;

use Quasarr\Entity\Setting;
use Quasarr\Entity\Torrent;
use Quasarr\Enum\Setting as SettingEnum;

trait TorrentResultsHelperTrait
{
    /**
     * Result structure:
     *     FirstSeen
     *     Tracker
     *     TrackerId
     *     CategoryDesc
     *     BlackholeLink
     *     Title
     *     Guid
     *     Link
     *     Comments
     *     PublishDate
     *     Category
     *     Size
     *     Files
     *     Grabs
     *     Description
     *     RageID
     *     TVDBId
     *     Imdb
     *     TMDb
     *     Seeders
     *     Peers
     *     BannerUrl
     *     InfoHash
     *     MagnetUri
     *     MinimumRatio
     *     MinimumSeedTime
     *     DownloadVolumeFactor
     *     UploadVolumeFactor
     *     Gain.
     */
    private function findBestResult(array $results, string $type = Torrent::MOVIE_TYPE)
    {
        if (!$this->settingRepository) {
            throw new \DomainException(sprintf('SettingRepository is mandatory while calling %s::%s', __CLASS__, __METHOD__));
        }

        $settings = [];
        foreach ($this->settingRepository->findAll() as $setting) {
            $settings[$setting->getKey()] = strpos($setting->getValue(), ',') !== false ? explode(',', $setting->getValue()) : $setting->getValue();

            if (\in_array($setting->getKey(), [SettingEnum::QUALITIES, SettingEnum::LANGUAGES])) {
                if (!\is_array($settings[$setting->getKey()])) {
                    $settings[$setting->getKey()] = explode('|', $settings[$setting->getKey()]);
                }
            }
        }

        $bestResult = [
            'score' => 0,
            'torrent' => null,
        ];

        foreach ($results as $key => $result) {
            $score = 0;

            if (Torrent::TVSEASON_TYPE === $type) {
                if (static::isEpisode($result->Title)) {
                    continue;
                }

                // @todo (size / number of episodes <= max_size)
            } else {
                if ($result->Size <= (int) $settings['max_size']) {
                    ++$score;
                }
            }

            if (\in_array(static::extractResolution($result->Title), $settings['resolutions'])) {
                ++$score;
            }
            if (\in_array(static::extractQualities($result->Title), $settings['qualities'])) {
                ++$score;
            }
            if (\in_array(static::extractLanguages($result->Title), $settings['languages'])) {
                ++$score;
            }
            if ($result->Seeders >= 3 && $result->Seeders > $result->Peers) {
                ++$score;
            }

            if ($score > $bestResult['score']) {
                $bestResult = [
                    'score' => $score,
                    'torrent' => $result,
                ];
            }
        }

        return $bestResult['torrent'];
    }

    private static function isEpisode(string $title): bool
    {
        return preg_match('/e\d+|episode|episode\d+|ep|ep\d+/', strtolower($title));
    }

    private static function extractResolution(string $title): ?string
    {
        $pattern = '([0-9]{3,4}p)';
        $matches = [];
        preg_match($pattern, $title, $matches);

        return reset($matches) ?: null;
    }

    private static function extractQualities(string $title): ?array
    {
        $pattern = '((?:PPV\.)?[HPS]DTV|(?:HD)?CAM|B[DR]Rip|(?:HD-?)?TS|(?:PPV )?WEB-?DL(?: DVDRip)?|HDRip|DVDRip|DVDRIP|CamRip|W[EB]BRip|BluRay|DvDScr|hdtv|telesync|4K(?:Light)?)';
        $matches = [];
        preg_match_all($pattern, $title, $matches);

        return $matches[0];
    }

    private static function extractLanguages(string $title): ?array
    {
        $pattern = '/(FR|VOSTFR|VO|VFF|VFQ|VFI|VF2|TRUEFRENCH|ENGLISH|ENG|MULTI)/i';
        $matches = [];
        preg_match_all($pattern, $title, $matches);

        return $matches[0];
    }

    private function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = ['', 'KiB', 'MiB', 'GiB', 'TiB'];

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }
}
