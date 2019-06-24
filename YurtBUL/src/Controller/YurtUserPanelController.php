<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
class YurtUserPanelController extends AbstractController
{
    /**
     * @Route("/yurtuser", name="yurtuser")
     */
    public function index()
    {
        return $this->render('yurt_user_panel/index.html.twig');
    }


    /**

     * @Route("/yurtusershow", name="yurtusershow", methods="GET")
     */
    public function show()
    {
        return $this->render('yurt_user_panel/index.html.twig');
    }
    /**
     * @Route("/yurtuseredit", name="yurtuseredit", methods="GET|POST")
     */
    public function yurtuseredit(Request $request):Response
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
                return $this->redirectToRoute('yurtuseredit');
            }
        }
        return $this->render('yurt_user_panel/editindex.html.twig', ['user'=>$user]);
    }
}
