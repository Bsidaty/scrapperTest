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


    function scrapPage($link , $uploads){
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

        $output = array_slice($images, 7);
        $images ="";
        define( 'FOLDER_PREFIX', date( "Y-m" )."/" );

        foreach ($output as $image){

            $extension = substr($image,-4);
            $imageName= $this->generateUniqueFileName() .$extension;

            file_put_contents('/var/www/html/kelchi/uploads/posts/'.FOLDER_PREFIX. '/'.$imageName, fopen($image, 'r'));
            $images = $images . ','  .FOLDER_PREFIX. $imageName;

            $src='/var/www/html/kelchi/uploads/posts/'.FOLDER_PREFIX. '/'.$imageName;
            $dest='/var/www/html/kelchi/uploads/posts/'.FOLDER_PREFIX. '/thumbs/'.$imageName;
            $desired_width="395";
           $this->make_thumb($src, $dest, $desired_width);
        }

        $images = substr($images,1,strlen($images)-1);
        $data->setImage($images);
        $data->setDescription($description);
        $data->setPrice($price);
        $data->setTitre($titre);
        $data->setTel($tel);


        return $data;
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }



    function make_thumb($src, $dest, $desired_width) {

        /* read the source image */
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    }

}
