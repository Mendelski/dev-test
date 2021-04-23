<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @Route("/property")
     *
     * @return Response
     */
    public function listAction(): Response
    {
        return $this->render('property.twig');
    }

    /**
     * @Route("/property/{id}")
     *
     * @param int $id
     * @return Response
     */
    public function propertyAction(int $id): Response
    {
        return $this->render('property.twig');
    }
}