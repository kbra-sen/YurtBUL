<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\IlceRepository;
class IlcelerController extends AbstractController
{

    /**
     * @Route("/ilceler", name="ilceler", methods="GET|POST")
     */
    public function index(IlceRepository $ilceRepository)
    {
        if(isset($_POST['il']))
        {
            $ilid=$_POST['il'];

            $ilcelist=$ilceRepository->findBy(['sehirid' => $ilid]);

            foreach ($ilcelist as $key=>$value)
            {
                echo '<option value="'.$value->getId().'">'.$value->getTitle().'</option>';
                //echo $value->getId();
                //print_r($value);
            }


        }
        return $this->render('ilceler/index.html.twig', [
            'controller_name' => 'IlcelerController',
        ]);
    }
    /**
     * @Route("/edityurt, name="edit_yurt", methods="GET|POST")

    public function edityurt(IlceRepository $ilceRepository)
    {
        if(isset($_POST['il']))
        {
            $ilid=$_POST['il'];

            $ilcelist=$ilceRepository->findBy(['sehirid' => $ilid]);

            foreach ($ilcelist as $key=>$value)
            {
                echo '<option value="'.$value->getId().'">'.$value->getTitle().'</option>';
                //echo $value->getId();
                //print_r($value);
            }


        }
        return $this->render('ilceler/index.html.twig', [
            'controller_name' => 'IlcelerController',
        ]);
    }*/
}
