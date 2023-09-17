<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * Description VoyagesController
 *
 * @author s
 */

 class VoyagesController extends AbstractController{
     /**
     * @Route("/voyages", name="voyages")
     * @return Response
     */
    public function index() : Response{
        return $this->render("pages/voyages.html.twig");
    }
 }