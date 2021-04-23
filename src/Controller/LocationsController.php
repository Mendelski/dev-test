<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationsController extends AbstractController
{

    /**
    * @Route("/")
    */
    public function homePage(): Response
    {

        return $this->render('home.twig');
    }
}