<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;
use App\Repository\UsersRepository;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @var Environment
     * @var UsersRepository
     */

     public function index(): Response 
     {
         return $this->render('pages/home.html.twig');
         
     }


    
}