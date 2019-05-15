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

        $client->waitFor('#dp');
        $data = new Scrap();
        $image =  $crawler->filter('div#imgTagWrapperId.imgTagWrapper img')->attr('src');
        $name =  $crawler->filter('span#productTitle.a-size-large')->text();
        $price =  $crawler->filter('span#priceblock_ourprice.a-size-medium.a-color-price.priceBlockBuyingPriceString')->text();
        $ref =  $crawler->filter('div#detail_bullets_id table tbody tr div ul li')->first()->text();
        $brand =  $crawler->filter('a#bylineInfo.a-link-normal')->text();
        $description =  $crawler->filter('div#feature-bullets.a-section.a-spacing-medium.a-spacing-top-small')->text();

        $nodeValues = $crawler->filter('div#detail_bullets_id table tbody tr div ul li')->each(function (Crawler $node, $i) {
            $pieces = explode(":", $node->text());

            if ( $pieces['0'] == "Numéro du modèle de l'article") {
                $ref = $pieces['1'];
                return $ref;
            }

            if ( $pieces['0'] == 'ASIN') {
                $asin = $pieces['1'];
                return $asin;
            }
        });

        $ref=$nodeValues['0'];
        $asin = $nodeValues['1'];

        $data->setName($name);
        $data->setPrice($price);
        $data->setimage($image);
        $data->setRef($ref);
        $data->setAsin($asin);
        $data->setBrand($brand);
        $data->setDescription($description);

        return $data;
    }
}
