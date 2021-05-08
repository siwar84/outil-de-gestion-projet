<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Ticket;
use App\Form\TicketFormType;

class TicketController extends AbstractController
{
    /**
     * @Route("/ticket", name="ticket")
     */
    public function index(Request $request): Response
    {
        $em         =$this->getDoctrine()->getManager();
        $tiket      = new Ticket();
        $form       =$this->createForm(TicketFormType::class, $Ticket);
        if ($request->isMethod('POST') && $form->handleRequest(($request)->isValid())){
            $em->persist($icket);
            $em->flush();
        }


        return $this->render('ticket/index.html.twig', [
            'form' =>$form->createview(),
        ]);
    }
}
