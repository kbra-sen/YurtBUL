<?php

namespace App\Controller;
use App\Entity\Admin\IletisimMesaj;
use App\Form\UserType;
use App\Entity\User;
use App\Form\Admin\IletisimMesajType;
use App\Repository\Admin\AyarlarRepository;
use App\Repository\UserRepository;
use App\Repository\Admin\YurtRepository;
use App\Repository\Admin\ImageRepository;
//use http\Env\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/front", name="front")
     */
    public function index(ImageRepository $imageRepository,YurtRepository $yurtRepository,AyarlarRepository $ayarlarRepository)
    {

        $veri=$ayarlarRepository->findAll();

        // $imagelist = $imageRepository->findAll();

        $em=$this->getDoctrine()->getManager();
        $sql="SELECT * FROM  yurt WHERE durum='true' ORDER BY ID DESC LIMIT 5";

        $statement=$em->getConnection()->prepare($sql);
        $statement->execute();
        $sliders= $statement->fetchAll();

        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
            'sliders'=> $sliders,
            'veri'=>$veri,

        ]);
    }

    /**
     * @Route("/hakkimizda", name="hakkimizda")
     */
    public function hakkimizda(AyarlarRepository $ayarlarRepository)
    {
        $veri=$ayarlarRepository->findAll();
        if ($this->isGranted('ROLE_YURT')) {
            return $this->render('yurt_ekrani/hakkimizda.html.twig', [
                'controller_name' => 'FrontController',
                'veri'=>$veri,

            ]);

        }
        elseif($this->isGranted('ROLE_USER'))
        {
            return $this->render('user_ekrani/hakkimizda.html.twig', [
                'controller_name' => 'FrontController',
                'veri'=>$veri,

            ]);
        }

        return $this->render('front/hakkimizda.html.twig', [
            'controller_name' => 'FrontController',
            'veri'=>$veri,

        ]);


    }
    /**
     * @Route("/girisekrani", name="girisekrani")
     */
    public function girisekrani()
    {


        return $this->render('front/girisyap.html.twig', [
            'controller_name' => 'FrontController',


        ]);

    }
    /**
     * @Route("/uyeekrani", name="uyeekrani")
     */
    public function uyeekrani()
    {


        return $this->render('front/uyeekrani.html.twig', [
            'controller_name' => 'FrontController',


        ]);

    }
    /**
     * @Route("/referanslar", name="referanslar")
     */
    public function referanslar(AyarlarRepository $ayarlarRepository)
    {

        $veri=$ayarlarRepository->findAll();
        return $this->render('front/referans.html.twig', [
            'controller_name' => 'FrontController',
            'veri'=>$veri,

        ]);

    }
    /**
     * @Route("/iletisim", name="iletisim",methods="GET|POST")
     */
    public function iletisim(AyarlarRepository $ayarlarRepository,Request $request)
    {
        $veri=$ayarlarRepository->findAll();
        $iletisimMesaj = new IletisimMesaj();
        $form = $this->createForm(IletisimMesajType::class, $iletisimMesaj);
        $form->handleRequest($request);
        $submittoken=$request->request->get('token');
        if ($form->isSubmitted() ) {
            if($this->isCsrfTokenValid('form-message',$submittoken))
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($iletisimMesaj);
                $em->flush();
                $this->addFlash('success', 'Mesaj Gönderildi.');
                return $this->redirectToRoute('iletisim');
            }


        }
        if ($this->isGranted('ROLE_YURT')) {
            return $this->render('yurt_ekrani/iletisim.html.twig', [

                'veri'=>$veri,
                'iletisim_mesaj' => $iletisimMesaj,

            ]);

        }
        elseif($this->isGranted('ROLE_USER'))
        {
            return $this->render('user_ekrani/iletisim.html.twig', [

                'veri'=>$veri,
                'iletisim_mesaj' => $iletisimMesaj,

            ]);
        }
        return $this->render('front/iletisim.html.twig', [

                'veri'=>$veri,
            'iletisim_mesaj' => $iletisimMesaj,

        ]);

    }

    /**
     * @Route("/kaydol", name="kaydol", methods="GET|POST")
     */
    public function new(Request $request,UserRepository $userRepository):Response
    {

        $user=new User();
        $form=$this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        $submitToken=$request->request->get('token');
        if($this->isCsrfTokenValid('user-form',$submitToken)) {
            if ($form->isSubmitted()) {
                $emaildata = $userRepository->findBy(['email' => $user->getEmail()]);
                if ($emaildata == null) {
                    $em = $this->getDoctrine()->getManager();
                    $user->setRoles("ROLE_USER");
                    $em->persist($user);
                    $em->flush();
                    $this->addFlash('success', 'Artık Üyesiniz! Sisteme giriş yapabilirsiniz.');
                    return $this->redirectToRoute('kaydol');
                }
                else {
                    $this->addFlash('success', 'Email daha önce kullanıldı!');
                }

            }
        }
        return $this->render('front/kaydol.html.twig', [
            'form'=>$form->createView(),
            'user'=>$user,
        ]);
    }
    /**
     * @Route("/yurtkaydol", name="yurtkaydol", methods="GET|POST")
     */
    public function yurtkaydol(Request $request,UserRepository $userRepository):Response
    {

        $user=new User();
        $form=$this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        $submitToken=$request->request->get('token');
        if($this->isCsrfTokenValid('yurt-form',$submitToken)) {
            if ($form->isSubmitted()) {
                $emaildata = $userRepository->findBy(['email' => $user->getEmail()]);
                if ($emaildata == null) {
                    $em = $this->getDoctrine()->getManager();
                    $user->setRoles("ROLE_YURT");
                    $em->persist($user);
                    $em->flush();
                    $this->addFlash('success', 'Artık Üyesiniz! Sisteme giriş yapabilirsiniz.');
                    return $this->redirectToRoute('kaydol');
                }
                else {
                    $this->addFlash('success', 'Email daha önce kullanıldı!');
                }

            }
        }
        return $this->render('front/yurtkaydol.html.twig', [
            'form'=>$form->createView(),
            'user'=>$user,
        ]);
    }




}
