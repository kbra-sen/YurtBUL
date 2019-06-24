<?php

namespace App\Controller;

use App\Entity\Favorilerim;
use App\Form\FavorilerimType;
use App\Repository\Admin\AyarlarRepository;
use App\Repository\FavorilerimRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/favorilerim")
 */
class FavorilerimController extends AbstractController
{
    /**
     * @Route("/", name="favorilerim_index", methods="GET")
     */
    public function index(FavorilerimRepository $favorilerimRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');//güvenlik için login kontrolü saglarmıs
        $user=$this->getUser();

        $em=$this->getDoctrine()->getManager();
        $sql="SELECT y.title,y.fiyat, f.* FROM favorilerim f, yurt y WHERE f.yurtid = y.id and f.userid= :userid";//favorideki yurt ile yurtlardaki id eşleşirse
                                                                                                                //ve favorideki user  fatma(user izinli)ile eşleşirse
        $statement=$em->getConnection()->prepare($sql);
        $statement->bindValue('userid',$user->getid());
        $statement->execute();
        $favorilerims= $statement->fetchAll();

        return $this->render('favorilerim/index.html.twig', ['favorilerims' => $favorilerims]);
    }

    /**
     * @Route("/new", name="favorilerim_new", methods="GET|POST")
     */
    public function new(Request $request,AyarlarRepository $ayarlarRepository): Response
    {
        $veri=$ayarlarRepository->findAll();
        $favorilerim = new Favorilerim();
        $form = $this->createForm(FavorilerimType::class, $favorilerim);
        $form->handleRequest($request);
        echo $submittedToken= $request->request->get('token');
       if($this->isCsrfTokenValid('add-item',$submittedToken))
        {
            if ($form->isSubmitted() ) {
                $em = $this->getDoctrine()->getManager();
                $user=$this->getUser();
                $favorilerim->setUserid($user->getId());
                $em->persist($favorilerim);
                $em->flush();

                return $this->redirectToRoute('favorilerim_index');
            }

        }


        return $this->render('favorilerim/new.html.twig', [
            'favorilerim' => $favorilerim,
            'form' => $form->createView(),
            'veri'=>$veri,
        ]);
    }

    /**
     * @Route("/{id}", name="favorilerim_show", methods="GET")
     */
    public function show(Favorilerim $favorilerim): Response
    {
        return $this->render('favorilerim/show.html.twig', ['favorilerim' => $favorilerim]);
    }

    /**
     * @Route("/{id}/edit", name="favorilerim_edit", methods="GET|POST")
     */
    public function edit(Request $request, Favorilerim $favorilerim): Response
    {
        $form = $this->createForm(FavorilerimType::class, $favorilerim);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('favorilerim_index', ['id' => $favorilerim->getId()]);
        }

        return $this->render('favorilerim/edit.html.twig', [
            'favorilerim' => $favorilerim,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="favorilerim_delete", methods="DELETE")
     */
    public function delete(Request $request, Favorilerim $favorilerim): Response
    {
        if ($this->isCsrfTokenValid('delete'.$favorilerim->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($favorilerim);
            $em->flush();
            $this->addFlash('success', 'Başarıyla Silindi');
        }

        return $this->redirectToRoute('favorilerim_index');
    }
}
