<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VisitesRepository;

/**
 * Description of VoyagesConrtoller
 *
 * @author emds
 */
class VoyagesConrtoller extends AbstractController{

    /**
     * 
     * @var VisitesRepository
     */
    private $reposority ;

    public function
    __construct(VisitesRepository $reposority )
    {
        $this->reposority = $reposority ;
        
    }

    /**
     * @Route("/voyages", name="voyages")
     * @return Response
     */
    public function index(): Response{
       $lesvisites =  $this->reposority->findAll();
       
        return $this->render("pages/voyages.html.twig", ['visites' => $lesvisites]);
    }

}