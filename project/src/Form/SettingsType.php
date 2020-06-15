<?php

namespace Quasarr\Form;

use Quasarr\Enum\Languages;
use Quasarr\Enum\Qualities;
use Quasarr\Enum\Resolutions;
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
                    'ANY' => Resolutions::ANY,
                    '480p' => Resolutions::_480p,
                    '720p' => Resolutions::_720p,
                    '1080p' => Resolutions::_1080p,
                    '2160p' => Resolutions::_2160p,
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add(Setting::QUALITIES, ChoiceType::class, [
                'choices' => [
                    'ANY' => Qualities::ANY,
                    'SDTV' => Qualities::SDTV,
                    'WEBDL' => Qualities::WEBDL,
                    'DVD' => Qualities::DVD,
                    'HDTV' => Qualities::HDTV,
                    'BluRay' => Qualities::BLURAY,
                    '4K' => Qualities::_4K,
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add(Setting::LANGUAGES, ChoiceType::class, [
                'choices' => [
                    'ANY' => Languages::ANY,
                    'FRENCH (VFF, VFQ)' => Languages::FRENCH,
                    'VFF' => Languages::VFF,
                    'VOSTFR' => Languages::VOSTFR,
                    'MULTI' => Languages::MULTI,
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
            ->add(Setting::SEARCH_LOCALE, ChoiceType::class, [
                'choices' => [
                    'Français' => 'fr',
                    'English' => 'en',
                ],
                'multiple' => false,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
