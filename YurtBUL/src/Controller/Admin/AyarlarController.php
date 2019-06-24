<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Ayarlar;
use App\Form\Admin\AyarlarType;
use App\Repository\Admin\AyarlarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/ayarlar")
 */
class AyarlarController extends AbstractController
{
    /**
     * @Route("/", name="admin_ayarlar_index", methods="GET")
     */
    public function index(AyarlarRepository $ayarlarRepository): Response
    {
        $ayarlar=$ayarlarRepository->findAll();

        if(!$ayarlar )
        {
            $ayarlar = new Ayarlar();
            $em = $this->getDoctrine()->getManager();
            $ayarlar->setTitle("Deneme");
            $em->persist($ayarlar);
            $em->flush();
            $ayarlar=$ayarlarRepository->findAll();
            dump($ayarlar);
            die();
        }
        return $this->redirectToRoute('admin_ayarlar_edit',['id'=>$ayarlar[0]->getId()]);
    }

    /**
     * @Route("/new", name="admin_ayarlar_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {

        $ayarlar = new Ayarlar();
        $form = $this->createForm(AyarlarType::class, $ayarlar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ayarlar);
            $em->flush();

            return $this->redirectToRoute('admin_ayarlar_index');
        }

        return $this->render('admin/ayarlar/new.html.twig', [
            'ayarlar' => $ayarlar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_ayarlar_show", methods="GET")
     */
    public function show(Ayarlar $ayarlar): Response
    {
        return $this->render('admin/ayarlar/show.html.twig', ['ayarlar' => $ayarlar]);
    }

    /**
     * @Route("/{id}/edit", name="admin_ayarlar_edit", methods="GET|POST")
     */
    public function edit(Request $request, Ayarlar $ayarlar): Response
    {
        $form = $this->createForm(AyarlarType::class, $ayarlar);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Başarıyla Kaydedildi');
            return $this->redirectToRoute('admin_ayarlar_index', ['id' => $ayarlar->getId()]);
        }

        return $this->render('admin/ayarlar/edit.html.twig', [
            'ayarlar' => $ayarlar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_ayarlar_delete", methods="DELETE")
     */
    public function delete(Request $request, Ayarlar $ayarlar): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ayarlar->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ayarlar);
            $em->flush();
        }

        return $this->redirectToRoute('admin_ayarlar_index');
    }
}
