<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Project;
use App\Form\ProjectType;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project")
     */
    public function index(Request $request): Response
    {
        $em         =$this->getDoctrine()->getManager();
        $project    =new Project();
        $form       = $this->createForm(ProjectType::class, $project);
        if ($request->isMethod('POST') && $form->handleRequest(($request)->isValid())){
            $em->persist($project);
            $em->flush();
        }

        return $this->render('project/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
