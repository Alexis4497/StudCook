<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class BonsPlansController extends AbstractController
{

    /**
     * 
     * @Route("/bonsplans", name="bonsplans.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/bonsplans.html.twig');
    }
}