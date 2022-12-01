<?php
namespace App\Controller\Admin;

use App\Entity\Marques;
use App\Form\MarquesType;
use App\Repository\MarquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class AdminMarquesController extends AbstractController{

    /**
     * @var marquesRepository
     */
    private $marquesRepository;

    public function __construct(MarquesRepository $marquesRepository, EntityManagerInterface $em)
    {
        $this->repository = $marquesRepository;
        $this->em = $em;
    }

    /**
     * @Route("/adminmarques", name="adminmarques")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminmarques()
    {
        $adminmarques = $this->repository->findAll();
        return $this->render('pages/admin-marques.html.twig', compact('adminmarques'));
    }

    /**
     * @Route("/adminmarques/{id}", name="adminmarquesedit")
     * @param Marques $marques
     * @return /Symfony/Component/HttpFoundation/Response
     */
    public function editMarques(Marques $marques, Request $request)
    {
        $form = $this->createForm(MarquesType::class, $marques);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success','Votre marque a été modifiée avec succès !');
            return $this->redirectToRoute('adminmarques');
        }

       return $this->render('pages/edit-marques.html.twig',[
        'marques' => $marques,
        'form' => $form->createView()
       ]);
    }

    /**
     * @Route("/adminmarques/create", name="adminmarquescreate")
     */

    public function newmarque(Request $request)
    {
        $marque= new Marques();

        $form = $this->createForm(MarquesType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($marque);
            $this->em->flush();
            $this->addFlash('success','Votre marque a été créée avec succès !');
            return $this->redirectToRoute('adminmarques');
        }
        return $this->render('pages/new-marques.html.twig',[
            'marque' => $marque,
            'form' => $form->createView()
           ]);

    }

    /**
     * @Route ("/deletemarque/{id}", name="deletemarque", methods={"POST","DELETE"})
     */

    public function deletemarque(Marques $marques) 
    {
         $this->em->remove($marques);
         $this->em->flush();
         $this->addFlash('success','Votre marque a été supprimée avec succès !');
         return $this->redirectToRoute('adminmarques');
    }

}