<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ScrapperTestController extends AbstractController
{
    /**
     * @Route("/scrapper/test", name="scrapper_test")
     */
    public function index()
    {

        $client = \Symfony\Component\Panther\Client::createChromeClient();
        $crawler = $client->request('GET', 'https://api-platform.com'); // Yes, this website is 100% in JavaScript

        $link = $crawler->selectLink('Support')->link();
        $crawler = $client->click($link);

        // Wait for an element to be rendered
        $client->waitFor('.support');

        echo $crawler->filter('.support')->text();
        //echo  $link->getUri();
        echo $crawler->selectLink('Demo')->link()->getUri();
        die();
        $linksCrawler = $crawler->selectLink('cloud');
        $link = $linksCrawler->link();
        $uri = $link->getUri();
        var_dump( $uri);
        die();

        $html = "<!DOCTYPE html>
<html>
    <body>
        <p class=\"message\">Hello World!</p>
        <p>Hello Crawler!</p>
    </body>
</html>";

        //$crawler = new Crawler($html);

        //echo $crawler->filter('.content_wrapper')->text();
        //  $crawlerBodies = $crawler->filter('body');
        //$crawlerSpans = $crawlerBodies->filter('h1');
        echo  $crawler->filter('div.versionadded')->text();
        die();
        $nodeValues = $crawler->filter('p')->each(function (Crawler $node, $i) {
            echo  $node->text();
            return $node->text();
        });

        var_dump($nodeValues);

        die();
        foreach ($crawler->filter('body') as $domElement) {
            $domElement = new Crawler($domElement);
            if (!empty($domElement->filter('h1')->text())){
                echo $domElement->filter('h1')->text();
            }
        }
        die();
        var_dump($crawlerSpans);
        foreach ($crawlerSpans as $spanElement) {
            // do something basic with $spanElement
            echo(  $spanElement->textContent);
        }

        die();

        $client = \Symfony\Component\Panther\Client::createChromeClient();
        $crawler = $client->request('GET', 'https://www.amazon.fr/Trussardi-Jeans-Jersey-Stretch-Manche/dp/B07K12GF9M/ref=sr_1_fkmr0_1?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&keywords=56T00133+1T001640&qid=1557127885&s=gateway&sr=8-1-fkmr0'); // Yes, this website is 100% in JavaScript

        //$link = $crawler->selectLink('docs')->link();
        // $crawler = $client->click($crawler);

// Wait for an element to be rendered
        $client->waitFor('#dp');

        $client->takeScreenshot('screen.png'); // Yeah, screenshot!
        die();
        echo $crawler->filter('#dp')->text();

        echo $crawler->filter('#dp')->children();


        die();

        $html = "<!DOCTYPE html>
<html>
    <body>
        <p class=\"message\">Hello World!</p>
        <p>Hello Crawler!</p>
    </body>
</html>";





die();
        return $this->render('scrapper_test/index.html.twig', [
            'controller_name' => 'ScrapperTestController',
        ]);
    }
}
