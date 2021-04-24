<?php

namespace App\Controller;

use App\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationsController extends AbstractController
{
    /**
     * @Route("/location", name="location_list")
     */
    public function listAction(): Response
    {
        $locations = $this->getDoctrine()
            ->getRepository(Location::class)
            ->findLocations();

        return $this->render('locations.twig', ['locations' => $locations]);
    }

    /**
     * @Route("/location/{slug}", name="location")
     */
    public function localAction(string $local): Response
    {
        return $this->render('locations.twig', ['local' => $local]);
    }
}