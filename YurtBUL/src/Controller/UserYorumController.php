<?php

namespace App\Controller;
use App\Form\UserType;
use App\Entity\User;
use App\Entity\UserYorum;
use App\Form\UserYorumType;
use App\Repository\Admin\YurtRepository;
use App\Repository\UserRepository;
use App\Repository\UserYorumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/yorum")
 */
class UserYorumController extends AbstractController
{
    /**
     * @Route("/", name="user_yorum_index", methods="GET")
     */
    public function index(UserYorumRepository $userYorumRepository,UserRepository $userRepository,YurtRepository $yurtRepository): Response
    {
        $userid=$this->getUser()->getId();

        $userad=$userRepository->findAll();
        $yurtad=$yurtRepository->findAll();
        return $this->render('user_yorum/yorumindex.html.twig', ['user_yorums' => $userYorumRepository->findAll(),
            'userad'=>$userad,
            'yurtad'=>$yurtad,
            'userid'=> $userid]);
    }

    /**
     * @Route("/new", name="user_yorum_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $userYorum = new UserYorum();
        $form = $this->createForm(UserYorumType::class, $userYorum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userYorum);
            $em->flush();

            return $this->redirectToRoute('user_yorum_index');
        }

        return $this->render('user_yorum/new.html.twig', [
            'user_yorum' => $userYorum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_yorum_show", methods="GET")
     */
    public function show(UserYorum $userYorum): Response
    {
        return $this->render('user_yorum/show.html.twig', ['user_yorum' => $userYorum]);
    }

    /**
     * @Route("/{id}/edit", name="user_yorum_edit", methods="GET|POST")
     */
    public function edit(Request $request, UserYorum $userYorum): Response
    {
        $form = $this->createForm(UserYorumType::class, $userYorum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_yorum_index', ['id' => $userYorum->getId()]);
        }

        return $this->render('user_yorum/edit.html.twig', [
            'user_yorum' => $userYorum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_yorum_delete", methods="DELETE")
     */
    public function delete(Request $request, UserYorum $userYorum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userYorum->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userYorum);
            $em->flush();
        }

        return $this->redirectToRoute('user_yorum_index');
    }

    /**
     * @Route("/usermesaj", name="usermesaj",methods="GET|POST")
     */
    public function usermesaj(Request $request)
    {

        $userYorum = new UserYorum();
        $form = $this->createForm(UserYorumType::class, $userYorum);
        $form->handleRequest($request);
        $submittoken=$request->request->get('token');
        if ($form->isSubmitted() ) {
            if($this->isCsrfTokenValid('form-usermesaj',$submittoken))
            {
                $em = $this->getDoctrine()->getManager();
                $user=$this->getUser();
                $userYorum->setUserid($user->getId());
                $em->persist($userYorum);
                $em->flush();
                $this->addFlash('success', 'Mesaj Gönderildi.');
                return $this->redirectToRoute('usermesaj');
            }


        }

        return $this->render('yurt_view/detay.html.twig', [
            'user_yorum' => $userYorum,

        ]);

    }
}
