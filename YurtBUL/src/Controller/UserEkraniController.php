<?php

namespace App\Controller;

use App\Repository\Admin\AyarlarRepository;
use App\Repository\UserRepository;
use App\Repository\UserYorumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;

class UserEkraniController extends AbstractController
{
    /**
     * @Route("/userekrani", name="userekrani")
     */
    public function index(AyarlarRepository $ayarlarRepository,UserYorumRepository $userYorumRepository,UserRepository $userRepository)
    {
        $veri=$ayarlarRepository->findAll();
        $yorumlar=$userYorumRepository->findAll();
        $userad=$userRepository->findAll();
        // $imagelist = $imageRepository->findAll();
        $em=$this->getDoctrine()->getManager();
        $sql="SELECT * FROM  yurt WHERE durum='true' ORDER BY ID DESC LIMIT 5";

        $statement=$em->getConnection()->prepare($sql);
        $statement->execute();
        $sliders= $statement->fetchAll();

        return $this->render('user_ekrani/index.html.twig', [
            'controller_name' => 'UserEkraniController',
            'sliders'=> $sliders,
            'veri'=>$veri,
            'yorumlar'=>$yorumlar,
            'userad'=>$userad,

        ]);
    }



}
