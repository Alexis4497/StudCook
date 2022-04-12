<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\RecettesRepository;
use App\Entity\Recettes;
use Doctrine\Persistence\ManagerRegistry;

class RecettesController extends AbstractController
{
      
    /**
     * Class RecettesController
     * @package App\Controller
     * @param RecettesRepository $repository
     * @Route("/recettes", name="recettes")
     * @return Response
     */
   

    public function recettes(RecettesRepository $repository)
    {
      
        return $this->render('pages/recettes.html.twig', [
            'recettes' => $repository -> findAll([]) 
        ]);
    }
}