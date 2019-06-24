<?php

namespace App\Controller\Admin;

use App\Entity\Admin\IletisimMesaj;
use App\Form\Admin\IletisimMesajType;
use App\Repository\Admin\IletisimMesajRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/iletisim/mesaj")
 */
class IletisimMesajController extends AbstractController
{
    /**
     * @Route("/", name="admin_iletisim_mesaj_index", methods="GET")
     */
    public function index(IletisimMesajRepository $iletisimMesajRepository): Response
    {
        return $this->render('admin/iletisim_mesaj/index.html.twig', ['iletisim_mesajs' => $iletisimMesajRepository->findAll()]);
    }

    /**
     * @Route("/new", name="admin_iletisim_mesaj_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $iletisimMesaj = new IletisimMesaj();
        $form = $this->createForm(IletisimMesajType::class, $iletisimMesaj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($iletisimMesaj);
            $em->flush();

            return $this->redirectToRoute('admin_iletisim_mesaj_index');
        }

        return $this->render('admin/iletisim_mesaj/new.html.twig', [
            'iletisim_mesaj' => $iletisimMesaj,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_iletisim_mesaj_show", methods="GET")
     */
    public function show(IletisimMesaj $iletisimMesaj): Response
    {
        return $this->render('admin/iletisim_mesaj/show.html.twig', ['iletisim_mesaj' => $iletisimMesaj]);
    }

    /**
     * @Route("/{id}/edit", name="admin_iletisim_mesaj_edit", methods="GET|POST")
     */
    public function edit(Request $request, IletisimMesaj $iletisimMesaj): Response
    {
        $form = $this->createForm(IletisimMesajType::class, $iletisimMesaj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_iletisim_mesaj_index', ['id' => $iletisimMesaj->getId()]);
        }

        return $this->render('admin/iletisim_mesaj/edit.html.twig', [
            'iletisim_mesaj' => $iletisimMesaj,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_iletisim_mesaj_delete", methods="DELETE")
     */
    public function delete(Request $request, IletisimMesaj $iletisimMesaj): Response
    {
        if ($this->isCsrfTokenValid('delete'.$iletisimMesaj->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($iletisimMesaj);
            $em->flush();
        }

        return $this->redirectToRoute('admin_iletisim_mesaj_index');
    }
}
