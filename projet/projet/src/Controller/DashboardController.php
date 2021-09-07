<?php

namespace App\Controller;

use App\Repository\AchatsRepository;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use App\Repository\VenteRepository;
use Doctrine\ORM\Repository\RepositoryFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(AchatsRepository $a, VenteRepository $v, ClientRepository $c, ProduitRepository $p  ): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'vall' => $v->countAll(),
            'aall' => $a->countAll(),
            'cw'=> $c->countCW(),
            'lw' => $c->countLW(),
            'ac'=> $a->countCW(),
            'al' => $a->countLW(),
            'vc'=> $v->countCW(),
            'vl' => $v->countLW(),
            'ventes' => $v->findAll(),
          'produits' => $p->findAll(),
            'nbra' => $a->countA(),
            'nbrc' => $c->countC(),
            'suma' => $a->suma(),
            'sumv' =>$v-> sumv(),
            'p' => $v->profit(),
            'n1' => $a->count1(),
            'n2' => $a->count2(),
            'n3' => $a->count3(),
            'n4' => $a->count4(),
            'n5' => $a->count5(),
            'n6' => $a->count6(),
            'n7' => $a->count7(),
            'n8' => $a->count8(),
            'n9' => $a->count9(),
            'n10' => $a->count10(),
            'n11' => $a->count11(),
            'n12' => $a->count12(),
            'nbrv'=>$v->countV(),
            'v1' => $v->count1(),
            'v2' => $v->count2(),
            'v3' => $v->count3(),
            'v4' => $v->count4(),
            'v5' => $v->count5(),
            'v6' => $v->count6(),
            'v7' => $v->count7(),
            'v8' => $v->count8(),
            'v9' => $v->count9(),
            'v10' => $v->count10(),
            'v11' => $v->count11(),
            'v12' => $v->count12()
        ]);
    }






    
}
