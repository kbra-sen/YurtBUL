<?php

namespace App\Controller\Admin;

use App\Repository\Admin\YurtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OnayBekleyenController extends AbstractController
{
    /**
     * @Route("/admin/onay/bekleyen", name="admin_onay_bekleyen")
     */
    public function index(YurtRepository $yurtRepository)
    {
        $onaysiz=$yurtRepository->findBy(['durum' => "false"]);
        return $this->render('admin/onay_bekleyen/index.html.twig', [
            'controller_name' => 'OnayBekleyenController',
            'onaysiz'=>$onaysiz,
        ]);
    }
}
