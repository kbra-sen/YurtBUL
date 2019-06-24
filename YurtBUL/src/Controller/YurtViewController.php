<?php

namespace App\Controller;

use App\Entity\Admin\Yurt;
use App\Repository\Admin\AyarlarRepository;
use App\Repository\Admin\CategoryRepository;
use App\Repository\Admin\YurtRepository;
use App\Repository\Admin\YurtSahibiRepository;
use App\Repository\Admin\ImageRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\Query\Expr\Select;
use function MongoDB\BSON\toJSON;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SehirRepository;
use App\Repository\IlceRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\UserYorum;
use App\Form\UserYorumType;
use App\Repository\UserYorumRepository;

class YurtViewController extends AbstractController
{
    /**
     * @Route("/view", name="view" ,methods="GET|POST")
     */
    public function index(UserRepository $userRepository,IlceRepository $ilceRepository,CategoryRepository $categoryRepository,AyarlarRepository $ayarlarRepository,SehirRepository $sehirRepository,ImageRepository $imageRepository)
    {
        $userbilgi=$userRepository->findAll();

        $veri=$ayarlarRepository->findAll();
        $cats=$this->categorytree();
        $em=$this->getDoctrine()->getManager();
        $sql='SELECT * FROM  yurt where  durum="true" ';
        $statement=$em->getConnection()->prepare($sql);
        $statement->execute();
        $yurtlar= $statement->fetchAll();


        $cats[0]='<ul id="menu-v">';
        $sehirlist = $sehirRepository->findAll();

        return $this->render('yurt_view/index.html.twig', [
            'controller_name' => 'YurtViewController',
            'sehirlist'=>$sehirlist,
            'yurtlar'=>$yurtlar,
            'cats'=> $cats,
            'veri'=>$veri,
            'userbilgi'=> $userbilgi,

        ]);
    }

    /**
     * @Route("/category/{catid}", name="category", methods="GET")
     */
    public function category($catid,AyarlarRepository $ayarlarRepository,CategoryRepository $categoryRepository,SehirRepository $sehirRepository)
    {

        $veri=$ayarlarRepository->findAll();
        $catveri=$categoryRepository->findBy(
            ['id'=> $catid]
        );
        $cats=$this->categorytree();
        $sehirlist = $sehirRepository->findAll();
        $em=$this->getDoctrine()->getManager();
        $cats[0]='<ul id="menu-v">';
        $sql='SELECT * FROM  yurt where  durum="true" and categoryid = :catid';
        $statement=$em->getConnection()->prepare($sql);
        $statement->bindValue('catid',$catid);

        $statement->execute();
        $yurtlar= $statement->fetchAll();

        return $this->render('yurt_view/categorindex.html.twig', [
            'catveri'=>$catveri,
            'yurtlar'=>$yurtlar,
            'sehirlist'=>$sehirlist,
            'veri'=>$veri,
            'cats'=> $cats,

        ]);


    }
    /**
     * @Route("/yurtdetay/{id}", name="yurt_detay", methods="GET|POST")
     */
    public function yurtdetay($id,UserYorumRepository $userYorumRepository,UserRepository $userRepository,IlceRepository $ilceRepository,SehirRepository $sehirRepository,CategoryRepository $categoryRepository,AyarlarRepository $ayarlarRepository,YurtRepository $yurtRepository,ImageRepository $imageRepository)
    {
        $yorumlar=$userYorumRepository->findAll();
        $userad=$userRepository->findAll();
        $totalcate=$categoryRepository->findAll();
        $sehir=$sehirRepository->findAll();
        $ilce=$ilceRepository->findAll();
        $veri=$ayarlarRepository->findAll();
        $yurts=$yurtRepository->findBy(
            ['id'=> $id]
        );
        $catveri=$categoryRepository->findBy(
            ['id'=> $id]
        );
        $resim=$imageRepository->findBy(
            ['yurtid'=> $id]
        );
        $cats=$this->categorytree();
        $cats[0]='<ul id="menu-v">';
        return $this->render('yurt_view/yurt_detay.html.twig', [
            'resim'=> $resim,
            'veri'=>$veri,
            'cats'=> $cats,
            'yurts'=> $yurts,
            'catveri'=>$catveri,
            'sehir'=>$sehir,
            'ilce'=>$ilce,
            'totalcate'=>$totalcate,
            'yorumlar'=>$yorumlar,
            'userad'=>$userad,

        ]);

    }

    public  function  categorytree($parent=0,$user_tree_array='')
    {
        if(!is_array($user_tree_array))
        {
            $user_tree_array=array();
        }

        $em=$this->getDoctrine()->getManager();
        $sql="SELECT * FROM  category WHERE status='true' and parentid=".$parent ;
        $statement=$em->getConnection()->prepare($sql);
        $statement->execute();
        $result= $statement->fetchAll();
        if(count($result) >0 )
        {
            $user_tree_array[]= "<ul>";
            foreach ($result as $row)
            {
                $user_tree_array[]="<li><a href='/category/".$row['id']."'>".$row['title']."</a>";
                $user_tree_array= $this->categorytree($row['id'],$user_tree_array);
            }
            $user_tree_array[]= "</li></ul>";
        }
        return $user_tree_array;
    }

    /**
     * @Route("/usermesaj/{pid}", name="usermesaj",methods="GET|POST")
     */
    public function usermesaj($pid,Request $request)
    {

        $userYorum = new UserYorum();
                $user=$this->getUser();
                $userYorum->setUserid($user->getId());
                $userYorum->setYurtid($pid);
                $userYorum->setAciklama($request->get("yorum"));
                $em = $this->getDoctrine()->getManager();
                $em->persist($userYorum);

                $em->flush();
                $this->addFlash('success', 'Yorumunuz Gönderildi.');
                return $this->redirect('/yurtdetay/'.$pid);


    }

}
