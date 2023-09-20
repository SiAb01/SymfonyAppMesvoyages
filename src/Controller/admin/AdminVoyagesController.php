<?php

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\VisitesRepository;
use App\Entity\Visites;
use App\Form\VisiteType ;


/**
 * Description of AdminVoyagesController
 *
 * Gérer la gestion des voyages 
 */
class AdminVoyagesController extends AbstractController
{
/**
 * @var VisitesReposiry 
 */
private $repository;

public function __construct(VisitesRepository $repository)
{
    $this->repository = $repository ;
}

    /**
     * @Route("/admin", name="admin.voyages")
     * @return Response
     */
    public function index(): Response
    {
        $visites = $this->repository->findAllOrderBy('datecreation', 'DESC');
        return $this->render('admin/admin.voyages.html.twig', [ 'visites' => $visites])
            
        ;
    }

 /**
 * @Route("/admin/suppr/{id}", name="admin.voyage.suppr")
 * @param Visites $visites
 * @return Response
 */
public function suppr(Visites $visites): Response{
    $this->repository->remove($visites, true);
    return $this->redirectToRoute('admin.voyages');
}


/**
     * @Route("/admin/edit/{id}", name="admin.voyage.edit")
     * @param Visites $visite
     * @param Request $request
     * @return Response
     */
    public function edit(Visites $visite, Request $request): Response{
        $formVisite = $this->createForm(VisiteType::class, $visite);

        $formVisite->handleRequest($request);
        if($formVisite->isSubmitted() && $formVisite->isValid()){
            $this->repository->add($visite, true);
            return $this->redirectToRoute('admin.voyages');
        }     

        return $this->render("admin/admin.voyage.edit.html.twig", [
            'visite' => $visite,
            'formvisite' => $formVisite->createView()
        ]);        
    }

}
