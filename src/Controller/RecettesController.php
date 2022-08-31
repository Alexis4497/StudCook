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
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Persistence\ManagerRegistry;


class RecettesController extends AbstractController
{
    
    private $repository;
      
    /**
     * Class RecettesController
     * @package App\Controller
     * @param RecettesRepository $repository
     * @Route("/recettes", name="recettes")
     * @return Response
     */

     public function __construct(RecettesRepository $repository)
     {
        $this->repository = $repository;
     }
   
     /**
      * @Route ("/recettes", name="recettes.index")
      * @return Response
      */

    public function index(PaginatorInterface $paginator, Request $request): Response
    {
      $search = new RecettesSearch();
      $form = $this->createForm(RecettesSearchType::class, $search);
      $form->handleRequest($request);
      $recettes = $paginator->paginate(
        $this->repository->findAllVisibleQuery($search),
        $request->query->getInt('page', 1),
        12
    );

      return $this->render('pages/recettes.html.twig', [
        'current_menu' => 'recettes',
        'recettes' => $recettes,
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