<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("Form", name="Form")
     */
    public function index(): Response
    {
        return $this->render('FormController/index.html.twig', [
            'controller_name' => 'FormController',
        ]);
    }
}
