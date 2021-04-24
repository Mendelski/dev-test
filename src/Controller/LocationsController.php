<?php

namespace App\Controller;

use App\Entity\Location;
use App\Service\FindProperty;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationsController extends AbstractController
{
    /**
     * @Route("/location", name="location_list", methods="GET")
     */
    public function listAction(): Response
    {
        $locations = $this->getDoctrine()
            ->getRepository(Location::class)
            ->findLocations();

        return $this->render('locations.twig', ['locations' => $locations]);
    }

    /**
     * @Route("/location/{slug}", name="location", methods="GET")
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @requires FindProperty
     */
    public function localAction(string $slug, FindProperty $findProperty): Response
    {
        /** @var Location $location */
        $location = $this->getDoctrine()
            ->getRepository(Location::class)
            ->findLocationBySlug($slug);

        $properties = $findProperty->findProperties($location);
        return $this->render('property.twig', ['properties' => $properties]);
    }
}