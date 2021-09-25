<?php

    // src/Controller/HomeController.php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    //require annotations dependancy that allows us to declare the routes of our controller in this file directly 
    use Symfony\Component\Routing\Annotation\Route;

    //controller class HomeController
    class HomeController extends AbstractController
    {
        //annotation to declare route of method response
        /**
            * @Route("/", name="index")
        */

        //method that will respond with HTML
        public function home()
        {
            return new Response(
                '<html><head><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"></head><body style="background-color: #4D2B5F; color: white; text-align: center; margin-top: 15px;"><img href="logo.png" alt="logo" width="300px" height="200px"><h1 style="font-family: Lobster, sans-serif; font-size: 80px;">Dream Team</h1><h4 style="font-family: Raleway, sans-serif; font-weight: 500; margin: 0; margin-top: 2px; font-size: 22px;">Individuate. Collaborate.</h4></body></html>'
            );
        }

        /**
            * @Route("/on-jung", name="on-jung")
        */
        public function onJung()
        {
            return new Response(
                '<html><body style="text-align: center";><h1>Carl Jung</h1></body></html>'
            );
        }
    }
?>