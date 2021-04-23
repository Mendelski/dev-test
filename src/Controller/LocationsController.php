<?php

namespace App\Controller;

use App\Entity\Location;
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
        $locations = $this->getDoctrine()
            ->getRepository(Location::class)
            ->findLocations();

        return $this->render('locations.twig', ['locations' => $locations]);
    }

    /**
     * @Route("/location/{locate}")
     */
    public function locateAction(string $locate): Response
    {
        return $this->render('locations.twig', ['locate' => $locate]);
    }
}