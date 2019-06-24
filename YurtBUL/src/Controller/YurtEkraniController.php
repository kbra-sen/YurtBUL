<?php

namespace App\Controller;
use App\Entity\Admin\Yurt;
use App\Form\Admin\YurtType;
use App\Repository\Admin\CategoryRepository;
use App\Repository\SehirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\Admin\AyarlarRepository;
use App\Entity\Admin\IletisimMesaj;
use App\Form\Admin\IletisimMesajType;
use App\Repository\Admin\UserRepository;
use App\Repository\Admin\YurtRepository;
use App\Repository\Admin\ImageRepository;
//use http\Env\Request;

use App\Repository\Admin\YurtSahibiRepository;

use App\Repository\IlceRepository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class YurtEkraniController extends AbstractController
{
    /**
     * @Route("/yurtekrani", name="yurt_ekrani")
     */
    public function index(AyarlarRepository $ayarlarRepository)
    {
        $em=$this->getDoctrine()->getManager();
        $sql="SELECT * FROM  yurt WHERE durum='true' ORDER BY ID DESC LIMIT 5";

        $statement=$em->getConnection()->prepare($sql);
        $statement->execute();
        $sliders= $statement->fetchAll();
        $veri=$ayarlarRepository->findAll();
        return $this->render('yurt_ekrani/index.html.twig', [
            'controller_name' => 'YurtEkraniController',
            'veri'=>$veri,
            'sliders'=> $sliders,
        ]);
    }

    /**
     * @Route("/yurtpaylas", name="yurtpaylas",methods="GET|POST")
     */
    public function yurtpaylas(AyarlarRepository $ayarlarRepository,SehirRepository $sehirRepository,Request $request,CategoryRepository $categoryRepository)
    {
        $veri=$ayarlarRepository->findAll();

        $catname=$categoryRepository->findBy(['id' => 0]);
        $catlist=$categoryRepository->findAll();
        $sehirlist = $sehirRepository->findAll();
        $yurt = new Yurt();
        $form = $this->createForm(YurtType::class, $yurt);
        $form->handleRequest($request);
        $submittoken=$request->request->get('token');
        if ($form->isSubmitted() ) {
            if($this->isCsrfTokenValid('form-yurt',$submittoken))
            {
                $em = $this->getDoctrine()->getManager();

                $user=$this->getUser();
                $yurt->setUserid($user->getId());
                 $em->persist($yurt);
                $em->flush();

                $this->addFlash('success', 'İlanınız Gönderildi.Onaylanmasını Bekleyin.');
                return $this->redirectToRoute('yurtpaylas');
            }


        }

        $veri=$ayarlarRepository->findAll();
        return $this->render('yurt_ekrani/yurtpaylasindex.html.twig', [
            'catlist'=>$catlist,
            'veri'=>$veri,
            'yurt' => $yurt,
            'sehirlist'=>$sehirlist,
            'catname'=>$catname,


        ]);

    }


    /**
     * @Route("/yurtprofil", name="yurt_profil")
     */
    public function yurtSahibiProfil(AyarlarRepository $ayarlarRepository)
    {
        $em=$this->getDoctrine()->getManager();
        $sql="SELECT * FROM  yurt WHERE durum='true' ORDER BY ID DESC LIMIT 5";

        $statement=$em->getConnection()->prepare($sql);
        $statement->execute();
        $sliders= $statement->fetchAll();
        $veri=$ayarlarRepository->findAll();
        return $this->render('yurt_ekrani/profil.html.twig', [
            'controller_name' => 'YurtEkraniController',
            'veri'=>$veri,

        ]);
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profil(AyarlarRepository $ayarlarRepository)
    {
        $em=$this->getDoctrine()->getManager();
        $sql="SELECT * FROM  yurt WHERE durum='true' ORDER BY ID DESC LIMIT 5";

        $statement=$em->getConnection()->prepare($sql);
        $statement->execute();
        $sliders= $statement->fetchAll();
        $veri=$ayarlarRepository->findAll();
        return $this->render('yurt_ekrani/profil.html.twig', [
            'controller_name' => 'YurtEkraniController',
            'veri'=>$veri,

        ]);
    }

}
