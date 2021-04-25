<?php

namespace App\Controller;

use App\Form\EnquireType;
use App\Service\FindProperty;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/property/{id}", name="property_details", methods={"GET","POST"})
     *
     * @param int $id
     * @param \App\Service\FindProperty $findProperty
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return Response
     */
    public function propertyAction(int $id, FindProperty $findProperty, Request $request)
    {
        $property = $findProperty->findOneById($id);
        
        $form = $this->renderForm();
        $form->handleRequest($request);
        
        return $this->render(
            'property_details.twig',
            [
                "property" => $property,
                "form" => $form->createView(),
            ]
        );
    }
    
    private function renderForm()
    {
        
        return $this->createForm(EnquireType::class)
            ->add(
                'Send',
                SubmitType::class,
                ['attr' => ['class' => 'form-control mt-4']]
            );
    }
    
}