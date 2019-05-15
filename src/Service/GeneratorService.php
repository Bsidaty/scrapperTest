<?php
/**
 * Created by PhpStorm.
 * User: sidatybrahim
 * Date: 2019-05-14
 * Time: 08:40
 */

namespace App\Service;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use XLSXReader\XLSXReader;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Entity\Scrap;


class GeneratorService
{
    function excelToarray($file , $extension){

        $package = new Package(new EmptyVersionStrategy());
        if ($extension=='xlsx'){

            $xlsx = new XLSXReader($package->getUrl('uploads/'.$file));
            $sheetNames = $xlsx->getSheetNames();

            $data = $xlsx->getSheetData($sheetNames['1']);

            return $data;
        }
        else if ($extension=='txt'){

            $rowNo = 1;
            // $fp is file pointer to file sample.csv
            $data = array();
            if (($fp = fopen($package->getUrl('uploads/'.$file), "r")) !== FALSE) {
                while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
                    array_push($data,$row);
                }
                fclose($fp);
            }
            return $data;
        }
    }

    public function generateCsvAction(Scrap $data) {

        $response = new StreamedResponse();
        $response->setCallback(function() use ($data) {
            $handle = fopen('php://output', 'w+');

            fputcsv($handle, ['Nom', 'Prix', 'image'], ';');

            fputcsv(
                $handle,
                [$data->getName(), $data->getPrice(), $data->getImage()],
                ';'
            );

            fclose($handle);
        });

        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition','attachment; filename="export-users.csv"');

        return $response;
    }
}
