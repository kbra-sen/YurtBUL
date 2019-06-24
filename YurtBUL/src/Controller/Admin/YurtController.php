<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Yurt;
use App\Form\Admin\YurtType;
use App\Repository\Admin\CategoryRepository;
use App\Repository\Admin\YurtRepository;

use App\Repository\SehirRepository;
use App\Repository\IlceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/yurt")
 */
class YurtController extends AbstractController
{
    /**
     * @Route("/", name="admin_yurt_index", methods="GET")
     */
    public function index(YurtRepository $yurtRepository): Response
    {
        return $this->render('admin/yurt/index.html.twig', ['yurts' => $yurtRepository->findAll()]);
    }

    /**
     * @Route("/new", name="admin_yurt_new", methods="GET|POST")
     */
    public function new(Request $request,CategoryRepository $categoryRepository,IlceRepository $ilceRepository,SehirRepository $sehirRepository): Response
    {

        $catlist=$categoryRepository->findAll();
        $catname=$categoryRepository->findBy(['id' => 0]);
        $sehirlist = $sehirRepository->findAll();
        $yurt = new Yurt();
        $form = $this->createForm(YurtType::class, $yurt);
        $form->handleRequest($request);


        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($yurt);
            $em->flush();

            $this->addFlash('success', 'Başarıyla Kaydedildi');
            return $this->redirectToRoute('admin_yurt_new');
        }

        return $this->render('admin/yurt/new.html.twig', [
            'yurt' => $yurt,
            'sehirlist'=>$sehirlist,
            'catlist'=>$catlist,
            'catname'=>$catname,
            'form' => $form->createView(),
        ]);
    }


    /**

     * @Route("/{id}", name="admin_yurt_show", methods="GET")
     */
    public function show(Yurt $yurt): Response
    {
        return $this->render('admin/yurt/show.html.twig', ['yurt' => $yurt]);
    }

    /**
     * @Route("/{id}/edit", name="admin_yurt_edit", methods="GET|POST")
     */
    public function edit(Request $request,IlceRepository $ilceRepository,CategoryRepository $categoryRepository,SehirRepository $sehirRepository,Yurt $yurt): Response
    {
        $catlist=$categoryRepository->findAll();
        $catname=$categoryRepository->findBy(['id' => $yurt->getCategoryid()]);
        $sehirlist = $sehirRepository->findAll();
        $ilcelist = $ilceRepository->findAll();
        $form = $this->createForm(YurtType::class, $yurt);
        $form->handleRequest($request);


        if ($form->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Başarıyla Güncellendi');
            return $this->redirectToRoute('admin_yurt_edit', ['id' => $yurt->getId()]);

        }

        return $this->render('admin/yurt/edit.html.twig', [
            'yurt' => $yurt,
            'sehirlist'=>$sehirlist,
            'ilcelist'=>$ilcelist,
            'catlist'=>$catlist,
            'catname'=>$catname,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}/iedit", name="admin_yurt_iedit", methods="GET|POST")
     */
    public function iedit(Request $request, $id, Yurt $yurt): Response
    {
        $form = $this->createForm(YurtType::class, $yurt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_yurt_index', ['id' => $yurt->getId()]);
        }

        return $this->render('admin/yurt/image_edit.html.twig', [
            'yurt' => $yurt,
            'id' => $id,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}/iupdate", name="admin_yurt_iupdate", methods="GET|POST")
     */
    public function iupdate(Request $request, $id, Yurt $yurt): Response
    {
        $form = $this->createForm(YurtType::class, $yurt);
        $form->handleRequest($request);

        if($request->files->get('imname')){
            $file = $request->files->get('imname');

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            // Move the file to the directory where brochures are stored
            try {
                $file->move(
                    $this->getParameter('images_directory'),//servis.yaml deki
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }
            $yurt->setImage($fileName);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_yurt_iedit', ['id' => $yurt->getId()]);
        }

    }
    /**
     * @Route("/{id}", name="admin_yurt_delete", methods="DELETE")
     */
    public function delete(Request $request, Yurt $yurt): Response
    {
        if ($this->isCsrfTokenValid('delete'.$yurt->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($yurt);
            $em->flush();
        }

        return $this->redirectToRoute('admin_yurt_index');
    }
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
    /**
     * @Route("/onay/bekleyen", name="admin_onay_bekleyen")
     */
    public function onayBekleyen(YurtRepository $yurtRepository)
    {
        $onaysiz=$yurtRepository->findBy(['durum' => "false"]);
        return $this->render('admin/yurt/onaybekle.html.twig', [
            'controller_name' => 'OnayBekleyenController',
            'onaysiz'=>$onaysiz,
        ]);
    }
    /**
     * @Route("/{id}/onayedit", name="yurt_edit", methods="GET|POST")
     */
    public function onayedit(Request $request,IlceRepository $ilceRepository,CategoryRepository $categoryRepository,SehirRepository $sehirRepository,Yurt $yurt): Response
    {
        $catlist=$categoryRepository->findAll();
        $catname=$categoryRepository->findBy(['id' => $yurt->getCategoryid()]);
        $sehirlist = $sehirRepository->findAll();
        $ilcelist = $ilceRepository->findAll();
        $form = $this->createForm(YurtType::class, $yurt);
        $form->handleRequest($request);


        if ($form->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Başarıyla Güncellendi');
            return $this->redirectToRoute('yurt_edit', ['id' => $yurt->getId()]);

        }

        return $this->render('admin/yurt/onayedit.html.twig', [
            'yurt' => $yurt,
            'sehirlist'=>$sehirlist,
            'ilcelist'=>$ilcelist,
            'catlist'=>$catlist,
            'catname'=>$catname,
            'form' => $form->createView(),
        ]);
    }
}
