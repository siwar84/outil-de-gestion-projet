<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Table;
use App\Form\TableType;

class TableController extends AbstractController
{
    /**
     * @Route("/table", name="table")
     */
    public function index(Request $request): Response
    {
        $em         =$this->getDoctrine()->getManager();
        $table      = new Table();
        $form       = $this->createForm(TableType::class, $table);
        if ($request->isMethod('POST') && $form->handleRequest(($request)->isValid())){
            $em->persist($table);
            $em->flush();
        }
        return $this->render('table/index.html.twig', [
            'form'=>$form->createView(),
        ]);
    }
}
