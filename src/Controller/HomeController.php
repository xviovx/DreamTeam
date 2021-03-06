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
            * @Route("/home", name="home")
        */
        
        public function home()
        {
            
            $view = 'home.html.twig';

            return $this->render($view);
        }

        /**
            * @Route("/", name="error")
        */
        public function error()
        {
            return new Response(
                '<html><body style="text-align: center";><h1>404 error</h1><h2>Sorry we could not find that page</h2></body></html>'
            );
        }
    }
?>