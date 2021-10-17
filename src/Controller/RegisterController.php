<?php

    // src/Controller/HomeController.php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    //require annotations dependancy that allows us to declare the routes of our controller in this file directly 
    use Symfony\Component\Routing\Annotation\Route;

    //controller class HomeController
    class RegisterController extends AbstractController
    {
        //annotation to declare route of method response
        /**
            * @Route("/register", name="register")
        */

        //method that will respond with HTML
        public function register() // default ID value
        {
            //identify twig template
            $view = 'register.html.twig';

            return $this->render($view);
            
        }
    }
?>