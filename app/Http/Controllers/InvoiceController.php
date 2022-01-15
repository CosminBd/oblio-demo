<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mrbig00\Oblio\Api\Client;

class InvoiceController extends Controller
{
    public function store(){
        $clientId = 'utilizatortest@test.ro';
        $clientSecret = '6c229bb35511c194edfe21c732466ddb579e222f';

        $data  = [
            "cif" => "34119074",
            "client" => [
                "cif" => "32245122",
                "name" => "OBLIO SOFTWARE SRL",
                "rc" => "J13/887/2017",
                "code" => "oblio",
                "address" => "",
                "state" => "Constanta",
                "city" => "Constanta",
                "country" => "",
                "iban" => "",
                "bank" => "",
                "email" => "",
                "phone" => "",
                "contact" => "",
                "vatPayer" => true
            ],
            "issueDate" => "2022-01-15",
            "dueDate" => "2022-01-30",
            "deliveryDate" => "2022-01-16",
            "collectDate" => "2022-01-29",
            "seriesName" => "PFA",
            "language" => "RO",
            "precision" => 2,
            "currency" => "RON",
            "products" => [
                [
                    "name" => "Test",
                    "code" => "test",
                    "description" => "Descriere de test",
                    "price" => 200,
                    "measuringUnit" => "buc",
                    "vatName" => "Normala",
                    "vatPercentage" => 19,
                    "vatIncluded" => 0,
                    "quantity" => 2,
                    "productType" => "Serviciu",
                    "management" => "Magazin"
                ],
                [
                    "name" => "Discount 10% Test",
                    "discount" => 10,
                    "discountType" => "procentual"
                ]
            ],
            "issuerName" => "Ion Popescu",
            "issuerId" => 1234567890123,
            "noticeNumber" => "AVZ 0041",
            "internalNote" => "Factura emisa din API",
            "deputyName" => "George Popescu",
            "deputyIdentityCard" => "ID 1234",
            "deputyAuto" => "CT 12345",
            "selesAgent" => "Marian Popescu",
            "mentions" => "Factura de test emisa din API",
            "workStation" => "Sediu"
        ];


        try {
            $oblioClient = new Client( $clientId, $clientSecret);
            $invoice = $oblioClient->addInvoice($data);
        }catch (\Exception $e){

//            here redirect the user to previous page with error message
            dd($e->getMessage());
        }

        dd($invoice);

//        on success invoice has this format
//      [
//          "seriesName" => "PFA"
//          "number" => "0002"
//          "link" => "https://www.oblio.eu/utils/show_file/?ic=377516&id=18572477&it=08eab3f5aa3f34b61d856160346efbd8"
//       ]
    }

    public function collect(){
        dd("TBD");
//        To be done

    }
}
