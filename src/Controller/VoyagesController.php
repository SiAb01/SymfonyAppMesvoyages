<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoyagesController extends AbstractController
{
    /**
     * @Route("/lesvoyages", name="app_voyages")
     */
    public function index(): Response
    {
        return $this->render('voyages/index.html.twig', [
            'controller_name' => 'VoyagesController',
        ]);
    }
}
