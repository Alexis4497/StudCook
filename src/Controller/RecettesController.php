<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\RecettesRepository;
use App\Entity\Recettes;
use App\Entity\RecettesSearch;
use App\Form\RecettesSearchType;
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
   

    public function recettes(RecettesRepository $repository, Request $request)
    {
      $search = new RecettesSearch();
      $form = $this->createForm(RecettesSearchType::class, $search);
      $form->handleRequest($request);

        return $this->render('pages/recettes.html.twig', [
            'recettes' => $repository -> findAll([]),
            'form' => $form->createView()

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