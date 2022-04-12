<?php 

namespace App\Controller\Admin ;

use App\Repository\RecettesRepository;
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

    public function index()
    {
       $recettes = $this->repository->findAll();
    }

}
