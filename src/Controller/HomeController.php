<?php

namespace App\Controller;

use App\Entity\Recettes;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;

class HomeController
{
    /**
     * @var Environment
     * @var RecettesRepository
     */
    private $twig;
    private $repository;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }
    public function __construct(RecettesRepository $repository){

    }
    
    public function index(): Response
    {
        return new Response($this->twig->render('pages/home.html.twig'));
    }

    public function recettes(ManagerRegistry $doctrine): Response
    {
        $recettes = $this->repository->find(1);
        dump($recettes);

        return new Response($this->twig->render('pages/recettes.html.twig'));
    }



    public function bonsplans(): Response
    {
        return new Response($this->twig->render('pages/bonsplans.html.twig'));
    }
    public function contact(): Response
    {
        return new Response($this->twig->render('pages/contact.html.twig'));
    }
}