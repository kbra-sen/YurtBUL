<?php

namespace App\Controller\UserPanel;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class UserpanelController extends AbstractController
{
    /**
     * @Route("/userpanel", name="userpanel")
     */
    public function index()
    {

        return $this->render('user_panel/index.html.twig');
    }

    /**

     * @Route("/show", name="user_panel_show", methods="GET")
     */
    public function show()
    {
        return $this->render('user_panel/index.html.twig');
    }
    /**
     * @Route("/paneledit", name="paneledit", methods="GET|POST")
     */
    public function paneledit(Request $request):Response
    {

        $usersession=$this->getUser();
        $user = $this->getDoctrine()->getRepository(User::class)->find($usersession->getId());

        $submitToken=$request->request->get('token');
        if($request->isMethod('POST') ){

            if($this->isCsrfTokenValid('form-guncel',$submitToken)) {

                $user->setName($request->request->get("name"));
                $user->setPassword($request->request->get("password"));
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Bilgileriniz Başarıyla Güncellendi.');
                return $this->redirectToRoute('paneledit');
            }
        }
        return $this->render('user_panel/editindex.html.twig', ['user'=>$user]);
    }

}
