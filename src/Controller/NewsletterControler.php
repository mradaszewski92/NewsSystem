<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

use App\Controller;
use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;




    class NewsletterControler extends AbstractController
    {

        public function index()
        {
            
            $str = "test";
            $prod = $this ->getDoctrine()->getRepository(News::class)->findAll();
       
        
            return $this->render("newsletter/index.html.twig",
                [
                'variable' => $str, 'urls' => $prod,
                ]);

        }
    }

?>
