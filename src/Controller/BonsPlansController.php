<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\BonsPlans;
use App\Repository\BonsPlansRepository;



class BonsPlansController extends AbstractController
{

    /**
     * 
     * @Route("/bonsplans", name="bonsplans")
     * @return Response
     */
    public function bonsplans(BonsPlansRepository $bonsplansrepository): Response
    {
        return $this->render('pages/bonsplans.html.twig', [
            'bonsplans' =>  $bonsplansrepository -> findAll([])
        ]);
    
    
    
    
    }
}