<?php
namespace App\Controller\Admin;

use App\Entity\BonsPlans;
use App\Form\BonsPlansType;
use App\Repository\BonsPlansRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class AdminBonsPlansController extends AbstractController{

    /**
     * @var bonsplansRepository
     */
    private $bonsplansRepository;

    public function __construct(BonsPlansRepository $bonsplansRepository, EntityManagerInterface $em)
    {
        $this->repository = $bonsplansRepository;
        $this->em = $em;
    }

    /**
     * @Route("/adminbonsplans", name="adminbonsplans")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminbonsplans()
    {
        $adminbonsplans = $this->repository->findAll();
        return $this->render('pages/admin-bonsplans.html.twig', compact('adminbonsplans'));
    }

    /**
     * @Route("/adminbonsplans/{id}", name="adminbonsplansedit")
     * @param BonsPlans $bonsplans
     * @return /Symfony/Component/HttpFoundation/Response
     */
    public function editBonsPlans(BonsPlans $bonsplans, Request $request)
    {
        $form = $this->createForm(BonsPlansType::class, $bonsplans);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            return $this->redirectToRoute('adminbonsplans');
        }

       return $this->render('pages/edit-bonsplans.html.twig',[
        'bonsplans' => $bonsplans,
        'form' => $form->createView()
       ]);
    }

    /**
     * @Route("/adminbonsplans/create", name="adminbonsplanscreate")
     */

    public function newbonplan(Request $request)
    {
        $bonplan = new BonsPlans();

        $form = $this->createForm(BonsPlansType::class, $bonplan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($bonplan);
            $this->em->flush();
            return $this->redirectToRoute('adminbonsplans');
        }
        return $this->render('pages/new-bonsplans.html.twig',[
            'bonplan' => $bonplan,
            'form' => $form->createView()
           ]);

    }

    /**
     * @Route ("/deletebonplan/{id}", name="deletebonsplans", methods="DELETE")
     */

    public function delete(BonsPlans $bonsplans) 
    {
         $this->em->remove($bonsplans);
         $this->em->flush();
         $this->addFlash('success','Votre bon plan a été supprimé avec succès !');
         return $this->redirectToRoute('adminbonsplans');
    }

}