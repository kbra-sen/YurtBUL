<?php

namespace App\Controller;

use App\Repository\Admin\AyarlarRepository;
use App\Repository\UserRepository;
use App\Repository\UserYorumRepository;
use http\Env\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils,AyarlarRepository $ayarlarRepository,UserRepository $userRepository,UserYorumRepository $userYorumRepository): Response
    {
        $em=$this->getDoctrine()->getManager();
        $sql="SELECT * FROM  yurt WHERE durum='true' ORDER BY ID DESC LIMIT 5";

        $statement=$em->getConnection()->prepare($sql);
        $statement->execute();
        $sliders= $statement->fetchAll();
        $veri=$ayarlarRepository->findAll();
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $yorumlar=$userYorumRepository->findAll();
        $userad=$userRepository->findAll();

        if ($this->isGranted('ROLE_YURT')) {
            return $this->render('yurt_ekrani\index.html.twig',
                ['last_username' => $lastUsername,
                    'error' => $error,
                    'veri' => $veri,
                    'sliders'=> $sliders,
                ]);

        }
        elseif($this->isGranted('ROLE_USER'))
        {
            return $this->render('user_ekrani/index.html.twig',
                ['last_username' => $lastUsername,
                    'error' => $error,
                    'veri' => $veri,
                    'sliders'=> $sliders,
                    'yorumlar'=>$yorumlar,
                    'userad'=>$userad,
                ]);
        }
        elseif($this->isGranted('ROLE_ADMIN'))
        {
            return $this->render('admin/index.html.twig',
                ['last_username' => $lastUsername,
                    'error' => $error,

                ]);
        }
        return $this->render('security/login.html.twig',
            ['last_username' => $lastUsername,
                'error' => $error,
                'veri'=>$veri,

            ]);
    }

    /**
     * @Route("/errorlogin", name="error_login")
     */
    public function errorlogin(AuthenticationUtils $authenticationUtils,AyarlarRepository $ayarlarRepository): Response
    {

        $veri=$ayarlarRepository->findAll();
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $this->addFlash('success', 'Bu Alana Erişim Yetkiniz Yok!');
        return $this->render('security/login.html.twig',
            ['last_username' => $lastUsername,
                'error' => $error,
                'veri'=>$veri,
            ]);
    }

}
