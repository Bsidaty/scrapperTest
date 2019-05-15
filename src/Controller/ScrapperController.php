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

        $data =   $this->scrapper($scrapperService );
        var_dump($data);
        die();

        $media = new Media();
        $form = $this->createForm(MediaType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
            /**
             * @var Symfony\Component\HttpFoundation\File\UploadedFile $file
             */
            $file = $form->get('file')->getData();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            $fileExtension = $file->guessExtension();
            // Move the file to the directory where brochures are stored
            try {
                $file->move(
                    $this->getParameter('upload_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                echo $e->getMessage();
            }

            $media->setFile($fileName);

            $data = $generatorService->excelToarray($media->getFile() , $fileExtension);
          return  $this->scrapper($data,$media->getName(),$scrapperService , $generatorService);

            die();
        }

        return $this->render('scrapper/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }




    public function scrapper(ScrapperService $scrapperService )
    {


        $data= $scrapperService->scrapPage('http://voursa.com/Annoncev.cfm?pdtid=131335&payee=2&adtre=NSSAN%20TD%2042');

                //$data = $this->scrapPage();
       // echo $data;
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




}

