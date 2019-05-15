<?php
/**
 * Created by PhpStorm.
 * User: sidatybrahim
 * Date: 2019-05-14
 * Time: 08:44
 */

namespace App\Service;
use App\Entity\Media;
use App\Entity\Scrap;
use App\Form\MediaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Panther\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use XLSXReader\XLSXReader;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ScrapperService
{


    function scrapPage($link){
        $client = \Symfony\Component\Panther\Client::createChromeClient();
        $crawler = $client->request('GET', $link); // Yes, this website is 100% in JavaScript

        $client->waitFor('#dync');
        $data = new Scrap();
        $titre =  $crawler->filter('div#annv_cntre span.contentc')->text();
        $price =  $crawler->filter('div#annv_cntre div.contentc1')->text();
        $description =  $crawler->filter('div#pdesc')->text();
        $tel =  $crawler->filter('div#vendinfo')->first()->html();

        $price=  substr($price , 0 , strpos($price , 'MRU'));

        $tel = substr($tel, strpos($tel , '<br>')+4, strlen($tel) - strripos($tel , '<br>'));
        $tel = str_replace('Téléphones:','',$tel);
        $tel = trim(str_replace('<br>','',$tel));

        $description = str_replace('Description:','',$description);

        $images = $crawler->filter('div#photodiv img')->each(function (Crawler $node, $i) {
            return $node->attr('src');
        });

        $data->setImage($images['3']);
        $data->setDescription($description);
        $data->setPrice($price);
        $data->setTitre($titre);
        $data->setTel($tel);


        return $data;
    }
}
