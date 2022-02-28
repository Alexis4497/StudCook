<?php

namespace App\Controller;

use App\Entity\Recettes;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ManagerRegistry;

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


        $recette = new Recettes();
        $recette->setTitreRecette("Chili con Carne")
        ->setDescriptionRecette("Ingrédients :
        -300 g de viande hachée
        -230g de chaire de tomate
        -250 g d’haricots rouges
        -2 sachets 1 personne de riz
        -140 g de maïs
        -épices chili
        Conseils de préparation :
        -égouttez les haricots rouges avant de les mélanger avec la viande
        ")
        ->setPrixRecette(4.20);
        $em = $this->getDoctrine()->getManager();
        $em-> persist($recette);
        $em->flush();



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