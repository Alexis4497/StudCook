<?php 

namespace App\Controller\Admin ;

use App\Entity\Recettes;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\RecettesRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController{

    /**
     * @var recettesRepository
     */
    private $recettesRepository;

    public function __construct(RecettesRepository $recettesRepository)
    {
        $this->repository = $recettesRepository;
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
     * @Route ("/edit/{id}", name="edit")
     */

    public function edit(Recettes $recette)
    {
        return $this->render('pages/edit.html.twig', compact('recette'));
    }

}
