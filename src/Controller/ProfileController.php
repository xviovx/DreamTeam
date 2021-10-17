<?php

    // src/Controller/HomeController.php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    //require annotations dependancy that allows us to declare the routes of our controller in this file directly 
    use Symfony\Component\Routing\Annotation\Route;

    //controller class HomeController
    class ProfileController extends AbstractController
    {
        //annotation to declare route of method response
        /**
            * @Route("/profile/{id}", name="view_profile")
        */

        //method that will respond with HTML
        public function viewProfile($id = null) // default ID value
        {

            //error handling when an ID is not supplied
            if($id == null){
                return $this->redirectToRoute('error');
            }

            //access wildcard value
            $userId = (int) $id;

            //default value
            $users = [
                array("id" => 1, "name" => "elliot_alderson", "email" => "el@yahoo.com", "bio" => "Dream analysis is bae"),
                array("id" => 2, "name" => "xviovx", "email" => "xviovx@gmail.com", "bio" => "Inspired by Jung. Here to analyse dreams")
            ];

            //identify twig template
            $view = 'profile.html.twig';

            //loop through dummy data to get user info based on $id
            foreach($users as $user) {
                if ($userId === $user['id']) {
                    $model['user'] = $user;
                }
            }

            return $this->render($view, $model);
        }
    }
?>