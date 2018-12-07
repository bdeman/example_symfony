<?php
/**
 * Created by PhpStorm.
 * User: Bart
 * Date: 12/07/2018
 * Time: 13:06
 */

namespace App\Controller;


//a controller must return a symfony response object

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AritcleController
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
        return new Response(sprintf("my article %s",$slug));
    }
}