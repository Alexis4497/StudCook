<?php 

namespace App\Controller\Admin ;

use App\Entity\Recettes;
use App\Form\RecetteType;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\RecettesRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends AbstractController{

    /**
     * @var recettesRepository
     */
    private $recettesRepository;

    public function __construct(RecettesRepository $recettesRepository, EntityManagerInterface $em)
    {
        $this->repository = $recettesRepository;
        $this->em = $em;
    }
    /**
     * @Route ("/admin", name="admin")
     * @return /Symfony/Component/HttpFoundation/Response
     */

    public function admin()
    {
       $recettes = $this->repository->findAll();

       return $this->render('pages/admin.html.twig', compact('recettes'));
    }

    /**
     * @Route ("/recettes/create", name="recette.create")
     */

     public function new(Request $request)
     {
         $recette = new Recettes();
         $form = $this->createForm(RecetteType::class, $recette);
         $form->handleRequest($request);
 
         if($form->isSubmitted() && $form->isValid())
         {
             $this->em->persist($recette);
             $this->em->flush();
             $this->addFlash('success','Votre recette a été créée avec succès !');
             return $this->redirectToRoute('admin');
         }

             return $this->render('pages/new.html.twig', [
                'recette' => $recette,
                'form' => $form->createView()
            
                ]);
 
         
     }


    /**
     * @Route ("/edit/{id}", name="edit", methods="GET|POST")
     */

    public function edit(Recettes $recette, Request $request)
    {
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            $this->addFlash('success','Votre recette a été modifiée avec succès !');
            return $this->redirectToRoute('admin');

        }

        return $this->render('pages/edit.html.twig', [
        'recette' => $recette,
        'form' => $form->createView()
    
        ]);
    }

    /**
     * @Route ("/delete/{id}", name="delete", methods="DELETE")
     */

       public function delete(Recettes $recette) 
       {
            $this->em->remove($recette);
            $this->em->flush();
            $this->addFlash('success','Votre recette a été supprimée avec succès !');
            return $this->redirectToRoute('admin');
       }




    
}
