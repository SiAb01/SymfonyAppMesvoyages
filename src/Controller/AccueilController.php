<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * Description of AccueilController
 *
 * @author siab
 */
class AccueilController extends AbstractController {
    
    /**
     * @Route("/", name="accueil")
     * @return Response
     */
    public function index(): Response{
        return $this->render("pages/accueil.html.twig");
    }
    //L'action index du controlleur Acceuil va retourne une page twig
}