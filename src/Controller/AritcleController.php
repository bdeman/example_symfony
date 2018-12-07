<?php
/**
 * Created by PhpStorm.
 * User: Bart
 * Date: 12/07/2018
 * Time: 13:06
 */

namespace App\Controller;


//a controller must return a symfony response object
//in order to be able to render a template you need to extend abastractcontroller ( baseclass)

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AritcleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage() {
        return new Response("hi");
    }


    //a slug is a url title
    //{} is a wildcarda
    /**
     * @Route("/news/{slug}")
     */
    public function show($slug) {

        $comments = ["hoi","broop","heyo"];
        return $this->render('article/show.html.twig',[
           'title' => ucwords(str_replace("-",' ',$slug)),
            'comments' => $comments,
        ]);
    }
}