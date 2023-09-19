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
       $lesvisites =  $this->reposority->findAllOrderBy('datecreation', 'DESC');
       
        return $this->render("pages/voyages.html.twig", ['visites' => $lesvisites]);
    }

   /**
     * @Route("/voyages/tri/{champ}/{ordre}", name="voyages.sort")
     * @param type $champ
     * @param type $ordre
     * @return Response
     */
    public function sort($champ, $ordre): Response{
        $visites = $this->reposority->findAllOrderBy($champ, $ordre);
        return $this->render("pages/voyages.html.twig", [
            'visites' => $visites
        ]);
    }


}