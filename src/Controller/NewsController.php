<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/* ------------------------------------------------------------- */
use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
class NewsController extends AbstractController
{
 
    public function index()
    {
        return $this->render('newsletter/index.html.twig', [
            'variable   ' => 'NewsController',
        ]);
    }

    public function addTitle():Response
    {
  
        $entityMgr = $this->getDoctrine()-> getManager();

        $entry = new News();
        
        $entry->setTitle("CVE-2019-10912");
        $entry->setBody("When unserialize() is called with content coming from user input, 
                        malicious payloads could be used to trigger file deletions or 
                        raw output being echoed."); 
        $entityMgr->persist($entry);
        $entityMgr->flush();
        return new Response('Saved new product with id '.$entry->getId());
    }

    public function showEntity($id)
    {
        $product = $this->getDoctrine()->getRepository(News::class)->find($id);
        if(!$product){
            throw $this->createNotFoundException('No title found for id '.$id);
        }

        return $this->render("newsletter/newsBody.html.twig",[
            'title'=>$product->getTitle($id),
            'body'=> $product->getBody($id)

        ]);
    }
}
        

