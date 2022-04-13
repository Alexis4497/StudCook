<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\RecettesRepository;
use App\Entity\Recettes;
use Doctrine\ORM\Mapping\Id;
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

    /**
     * @return Reponse
     * @Route("/show/{id}", name="show")
     */

    public function show(Recettes $recettes,RecettesRepository $repository): Response
    {
       
        $monid = $recettes -> getId();




        return $this->render('pages/show.html.twig', [
            'monid'=> $recettes -> getId(),
            'recettes' => $repository -> findAll([]), 
            'current_menu' => 'show'
        ]);
    }
}