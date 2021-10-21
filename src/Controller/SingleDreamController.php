<?php

    // src/Controller/HomeController.php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    //require annotations dependancy that allows us to declare the routes of our controller in this file directly 
    use Symfony\Component\Routing\Annotation\Route;

    //controller class HomeController
    class SingleDreamController extends AbstractController
    {
        //annotation to declare route of method response
        /**
            * @Route("/dream-post", name="dream-post")
        */
        
        public function home()
        {
            
            $view = 'single-dream.html.twig';

            return $this->render($view);
        }
    }
?>