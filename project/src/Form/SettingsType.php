<?php

namespace Quasarr\Form;

use Quasarr\Enum\Setting;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(Setting::RESOLUTIONS, ChoiceType::class, [
                'choices' => [
                    'any' => 'any',
                    '480p' => '480p',
                    '720p' => '720p',
                    '1080p' => '1080p',
                    '2160p' => '2160p',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add(Setting::QUALITIES, ChoiceType::class, [
                'choices' => [
                    'any' => 'any',
                    'SDTV' => 'SDTV',
                    'WEBDL' => 'WEBDL|WEB-DL|WEBRip',
                    'DVD' => 'DVD|DVDRip',
                    'HDTV' => 'HDTV|HDRip',
                    'BluRay' => 'BluRay|BRip|BRRip|BDRip',
                    '4K' => '4K|4KLight',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add(Setting::LANGUAGES, ChoiceType::class, [
                'choices' => [
                    'any' => 'any',
                    'FRENCH (VFF, VFQ)' => 'VFF|VFQ',
                    'VFF' => 'VFF',
                    'VOSTFR' => 'VOSTFR',
                    'MULTI' => 'MULTI',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add(Setting::MAX_SIZE, NumberType::class, [
                'label' => 'Max size per torrent (in bytes)',
                'html5' => false,
                'help' => 'auto convert as type',
                'attr' => [
                    'autocomplete' => 'off',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
