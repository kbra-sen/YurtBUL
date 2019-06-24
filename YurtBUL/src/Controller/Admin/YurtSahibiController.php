<?php

namespace App\Controller\Admin;

use App\Entity\Admin\YurtSahibi;
use App\Form\Admin\YurtSahibiType;
use App\Repository\Admin\YurtRepository;
use App\Repository\Admin\YurtSahibiRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/yurt/sahibi")
 */
class YurtSahibiController extends AbstractController
{



    /**
     * @Route("/", name="admin_yurt_sahibi", methods="GET")
     */
    public function index(UserRepository $userRepository): Response
    {
        $yurtsahib=$userRepository->findBy(['roles' => "ROLE_YURT"]);

        return $this->render('admin/yurt_sahibi/index.html.twig', ['yurt_sahibis' => $yurtsahib]);
    }


}
