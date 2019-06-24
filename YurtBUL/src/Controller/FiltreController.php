<?php

namespace App\Controller;

use App\Repository\Admin\YurtRepository;
use App\Repository\SehirRepository;
use App\Repository\IlceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FiltreController extends AbstractController
{
    /**
     * @Route("/filtre", name="filtre" , methods="GET|POST")
     */
    public function index(IlceRepository $ilceRepository,YurtRepository $yurtRepository,SehirRepository $sehirRepository)
    {
        /*$ilid=$_POST['il'];
        $ilceid=$_POST['ilce'];
        $tipid=$_POST['tip'];
        $turid=$_POST['tur'];
        $em=$this->getDoctrine()->getManager();
        $sql="SELECT * FROM  yurt WHERE durum='true' sehirid='ilid' ilce='ilceid' tipid='tipid', turid='turid' ";
        $statement=$em->getConnection()->prepare($sql);
        $statement->execute();
        $sorgu= $statement->fetchAll();

        $illist=$sehirRepository->findBy(['sehirid' => $ilid]);
        $ilcelist=$ilceRepository->findBy(['id' => $ilceid]);
        $tiplist=$yurtRepository->findBy(['tipid' => $tipid]);
        $turlist=$yurtRepository->findBy(['turid' => $turid]);

        foreach ($sorgu as $key=>$value)
        {
            echo ' <option value="'.$value->getId().'">'.$value->getTitle().'</option>';
            //echo $value->getId();
            //print_r($value);
        }
        */
        return $this->render('filtre/index.html.twig', [
            'controller_name' => 'FiltreController',
            'sorgu'
        ]);
    }
}
