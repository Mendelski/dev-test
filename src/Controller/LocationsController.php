<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationsController extends AbstractController
{

    /**
     * @Route("/location")
     */
    public function listAction(): Response
    {
        $locations = [];

        return $this->render('locations.twig', $locations);
    }

    /**
     * @Route("/location/{locate}")
     */
    public function locateAction(string $locate): Response
    {
        return $this->render('locations.twig', ['locate' => $locate]);
    }
}