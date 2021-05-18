<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController ;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController
{

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $utils):string
    {
        $error = $utils->getLastAuthenticationError();

        $lastUsername = $utils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'error'         => $error,
            'last_Username' => $lastUsername
        ]);
    }

     /**
     * @Route("/logout", name="logout")
     */
    public static function logout():string{}

}
