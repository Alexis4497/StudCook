<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\MarquesRepository;
use App\Entity\Marques;




class MarquesController extends AbstractController
{
        /**
         * 
         * @Route("/", name="marques")
         * @return Response
         */
        public function marques(MarquesRepository $marquesrepository): Response
        {
            return $this->render('pages/home.html.twig', [
                'marques' =>  $marquesrepository -> findAll([])
            ]);
        
        
        
        
        }
    }