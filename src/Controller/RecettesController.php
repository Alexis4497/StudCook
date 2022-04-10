<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recettes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecettesController extends AbstractController
{

    /**
     * 
     * @Route("/recettes", name="recettes.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/recettes.html.twig');
    }
}