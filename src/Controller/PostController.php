<?php

    // src/Controller/HomeController.php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    //require annotations dependancy that allows us to declare the routes of our controller in this file directly 
    use Symfony\Component\Routing\Annotation\Route;

    //controller class HomeController
    class PostController extends AbstractController
    {
        //annotation to declare route of method response
        /**
            * @Route("/post", name="post")
        */
        
        public function postDream()
        {
            $view = 'post.html.twig';

            return $this->render($view);
        }
    }
?>