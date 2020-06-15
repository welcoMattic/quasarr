<?php

namespace Quasarr\Controller;

use Quasarr\Entity\Setting;
use Quasarr\Enum\Setting as SettingEnum;
use Quasarr\Form\SettingsType;
use Quasarr\Repository\SettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingController extends AbstractController
{
    /**
     * @Route("/settings", name="settings")
     */
    public function index(Request $request, SettingRepository $settingRepository): Response
    {
        $currentSettings = [];
        foreach ($settingRepository->getAllAsArray() as $setting) {
            if (false !== strpos($setting['value'], ',')) {
                $currentSettings[$setting['key']] = explode(',', $setting['value']);
            } elseif (\in_array($setting['key'], [SettingEnum::LANGUAGES, SettingEnum::QUALITIES, SettingEnum::RESOLUTIONS])) {
                $currentSettings[$setting['key']] = [$setting['value']];
            } else {
                $currentSettings[$setting['key']] = $setting['value'];
            }
        }

        $form = $this->createForm(SettingsType::class, $currentSettings);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                foreach ($form->getData() as $key => $value) {
                    $setting = new Setting();
                    $setting->setKey($key);
                    if (\is_array($value)) {
                        $setting->setValue(implode(',', $value));
                    } elseif (\is_numeric($value)) {
                        $setting->setValue((int) $value);
                    } else {
                        $setting->setValue($value);
                    }

                    $this->getDoctrine()->getManager()->persist($setting);
                }
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'settings.updated.success');

                return $this->redirectToRoute('settings');
            } else {
                $this->addFlash('error', 'settings.updated.error');
            }
        }

        return $this->render('setting/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
