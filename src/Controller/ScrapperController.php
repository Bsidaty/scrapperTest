<?php

namespace App\Controller;

use App\Entity\Media;
use App\Entity\Scrap;
use App\Form\MediaType;
use App\Service\ScrapperService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Panther\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use XLSXReader\XLSXReader;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use App\Service\GeneratorService;
use Symfony\Component\HttpFoundation\StreamedResponse;


class ScrapperController extends AbstractController
{

     private $scrapperService;
     public $generatorService;
    /**
     * @Route("/scrapper", name="app_scrapper_index")
     */
    public function new(Request $request , ScrapperService $scrapperService , GeneratorService $generatorService)
    {

       /*
        $data =   $this->scrapper($scrapperService );
        var_dump($data);
        $extension = substr($data->getImage(),-4);
        $imageName= $this->generateUniqueFileName() .$extension;
        var_dump($imageName);
        file_put_contents($this->getParameter('upload_directory'). '/'.$imageName, fopen($data->getImage(), 'r'));
        */

        $media = new Media();
        $form = $this->createForm(MediaType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $data =   $this->scrapper($media,$scrapperService , $generatorService);

            $post = [
                'token' => '71123826',
                'title' => $data->getTitre(),
                'category_id' => $media->getCategorie(),
                'xfield[country]' => 'Mauritanie',
                'xfield[region]' => 'Nouakchott',
                'xfield[city]' => 'nouakchott',
                'xfield[price]' => $data->getPrice(),
                'xfield[phone]' => $data->getTel(),
                'xfield[pm]' => '1',
                'xfield[skrin]' => $data->getImage(),
                'xfield[description]' => $data->getDescription(),
                'allow_rate' => '1',
                'allow_comm' => '1',
            ];

            $ch = curl_init('https://localhost/kelchi/index.php?do=post_ad_api_2');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
            $response = curl_exec($ch);

// close the connection, release resources used
            curl_close($ch);

// do anything you want with your response

            return $this->render('scrapper/index.html.twig', [
                'form' => $form->createView(),
                'response' => $response
            ]);

        }

        return $this->render('scrapper/index.html.twig', [
            'form' => $form->createView(),
            'response' => ''

        ]);
    }




    public function scrapper(Media $media , ScrapperService $scrapperService )
    {

        $uploads = $this->getParameter("upload_directory");

        $data= $scrapperService->scrapPage($media->getLink(), $uploads);

            return $data;

    }


}

