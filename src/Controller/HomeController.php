<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController
{
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }
    public function index(): Response
    {
        return new Response($this->twig->render('pages/home.html.twig'));
    }
    public function recettes(): Response
    {
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