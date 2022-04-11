<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\RecettesRepository;

class RecettesController extends AbstractController
{
      
    /**
     * @param RecettesRepository $repository
     * @Route("/recettes", name="recettes.index")
     * @return Response
     */
   

    public function index(RecettesRepository $repository): Response
    {
      
        $recette = $repository->findAll();
        
        
        return $this->render('pages/recettes.html.twig', [
            'recette' => '$recette'
        ]);
    }
}