<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @Route("/property", name="property_list", methods="GET")
     *
     * @return Response
     */
    public function listAction(): Response
    {
        return $this->render('home.twig');
    }

    /**
     * @Route("/property/{id}", name="property_details", methods="GET")
     *
     * @param int $id
     * @return Response
     */
    public function propertyAction(int $id): Response
    {
        return $this->render('home.twig');
    }
}