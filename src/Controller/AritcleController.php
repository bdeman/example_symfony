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

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AritcleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage() {
        return $this->render("article/home.html.twig");
    }


    //a slug is a url title
    //{} is a wildcarda
    /**
     * @Route("/news/{slug}/{id}")
     */
    public function show($slug,$id) {

        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        $comments = ["hoi","broop","heyo"];
        return $this->render('article/show.html.twig',[
           'article'=>$article,
            'tags' => $article->getTags(),
            'comments' => $comments,
        ]);
    }

    /**
     * @Route("/articles")
     */
    public function getArticles() {
        $articles =  $this->getDoctrine()->getManager()->getRepository(Article::class)->findAll();

        return $this->render('article/articles.html.twig',[
           'articles' => $articles,
        ]);
    }

    /**
     * @Route("/articles/init")
     */
    public function initDB() {


       // $manager =  $this->getDoctrine()->getManager();


//
//        $tags = [];
//        array_push($tags,new Tag("Symfony","framework php"));
//        array_push($tags,new Tag("Bart","de Man"));
//        array_push($tags,new Tag("Backend","Backend of the websites"));
//        array_push($tags,new Tag("Doctrine","Object Relational Mapper"));
//        array_push($tags,new Tag("Slugs","Nice way to handle information trough the URL"));
//
//        foreach ($tags as $tag) {
//            $manager->persist($tag);
//        }

//        $articles = [];
//        array_push($articles,[
//            'title'=>'Programming in Symfony is pretty cool and here is why',
//            "body"=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sed tincidunt quam. Duis at lacus pulvinar, pulvinar metus sit amet, convallis leo. Phasellus libero est, vehicula nec consectetur nec, egestas id est. Mauris ante neque, commodo quis augue ut, cursus luctus neque. Donec maximus est orci, at volutpat eros scelerisque et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras semper justo eget tempor elementum.',
//            "tags"=>"symfony,rocks,php"
//        ]);
//        array_push($articles,[
//            'title'=>'Article 2',
//            "body"=>'Nullam ac lobortis diam. Phasellus lacinia justo vitae ligula iaculis, sed aliquam augue volutpat. Nam aliquam felis ut libero efficitur, in efficitur tellus sodales. Etiam sit amet magna consequat, aliquam nisi elementum, condimentum velit. Nam nisi lacus, convallis quis porta ac, fermentum quis augue. Nullam sollicitudin orci auctor nibh mattis, non elementum nunc convallis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse faucibus mi non ipsum sodales mollis. Suspendisse quis ligula faucibus, sollicitudin nisl non, varius nulla.',
//            "tags"=>'tag1,tag2,tag3'
//        ]);
//
//
//
//        foreach ($articles as $articleSingle) {
//            echo $articleSingle['tags'];
//            $article = new Article();
//            $article->setBody($articleSingle['body']);
//            $article->setTitle($articleSingle['title']);
//            $article->setTags($articleSingle['tags']);
//            $manager->persist($article);
//        }
//        $manager->flush();

//        return new Response('initialized DB');
    }
}