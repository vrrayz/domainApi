<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainApiController extends Controller
{
    //

    public function index(Request $request)
    {
        // create curl resource

        $ch = curl_init();
        $url = 'https://' . env('NAMECHEAP_SERVICE_URL') . '/xml.response';
        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER'),
            'ApiKey' => env('NAMECHEAP_API_KEY'),
            'UserName' => env('NAMECHEAP_API_USER'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP'),
            'Command' => 'namecheap.domains.check', // this is dynamic
            'DomainList' => 'domain1.com', // as an example, this param is required for the namecheap.domains.check command
        ];
        $url_with_params = $url . '?' . http_build_query($params);



        // set url

        curl_setopt($ch, CURLOPT_URL, $url_with_params);



        //return the transfer as a string

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



        // $output contains the output string

        $output = curl_exec($ch);


        // close curl resource to free up system resources

        curl_close($ch);

        // libxml_use_internal_errors(true); // Enable internal error handling
        $xml = simplexml_load_string($output);
        $outputInArray = json_decode(json_encode($xml), true);

        // dd($outputInArray);
        dd($outputInArray['CommandResponse']['DomainCheckResult']['@attributes']['Available']);

        //     $responseFormat = [▼
        //         "@attributes" =>  [],
        //         "Errors" => [],
        //         "Warnings" => [],
        //         "RequestedCommand" => "namecheap.domains.check",
        //         "CommandResponse" => [],
        //         "Server" => "PHX01SBAPIEXT05",
        //         "GMTTimeDifference" => "--5:00",
        //         "ExecutionTime" => "0.01",
        // ];
        // For the responseFormat. if Errors key isn't empty then CommandResponse will not be present
    }
    public function createDomain(Request $request)
    {
        // create curl resource

        $ch = curl_init();
        $url = 'https://' . env('NAMECHEAP_SERVICE_URL') . '/xml.response';
        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER'),
            'ApiKey' => env('NAMECHEAP_API_KEY'),
            'UserName' => env('NAMECHEAP_API_USER'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP'),
            'Command' => 'namecheap.domains.create', // this is dynamic
            'DomainName' => 'xepho-test1.com',
            'Years' => 2,
            'RegistrantFirstName' => 'James',
            'RegistrantLastName' => 'Maddison',
            'RegistrantAddress1' => '72 Harrogate Road',
            'RegistrantCity' => 'Ruscombe',
            'RegistrantStateProvince' => 'Berkshire',
            'RegistrantPostalCode' => 'RG10 8AA',
            'RegistrantCountry' => 'United Kingdom',
            'RegistrantPhone' => '+447.704256986', // phone number format must be +NNN.NNNNNNNNNN
            'RegistrantEmailAddress' => 'emmyvic98@gmail.com',
            'TechFirstName' => 'Xepho',
            'TechLastName' => 'Co',
            'TechAddress1' => '72 Harrogate Road',
            'TechCity' => 'Ruscombe',
            'TechStateProvince' => 'Berkshire',
            'TechPostalCode' => 'RG10 8AA',
            'TechCountry' => 'United Kingdom',
            'TechPhone' => '+447.704256986',
            'TechEmailAddress' => 'emmyvic98@gmail.com',
            'AdminFirstName' => 'Xepho',
            'AdminLastName' => 'Co',
            'AdminAddress1' => '72 Harrogate Road',
            'AdminCity' => 'Ruscombe',
            'AdminStateProvince' => 'Berkshire',
            'AdminPostalCode' => 'RG10 8AA',
            'AdminCountry' => 'United Kingdom',
            'AdminPhone' => '+447.704256986',
            'AdminEmailAddress' => 'emmyvic98@gmail.com',
            'AuxBillingFirstName' => 'Xepho',
            'AuxBillingLastName' => 'Co',
            'AuxBillingAddress1' => '72 Harrogate Road',
            'AuxBillingCity' => 'Ruscombe',
            'AuxBillingStateProvince' => 'Berkshire',
            'AuxBillingPostalCode' => 'RG10 8AA',
            'AuxBillingCountry' => 'United Kingdom',
            'AuxBillingPhone' => '+447.704256986',
            'AuxBillingEmailAddress' => 'emmyvic98@gmail.com',
        ];
        $url_with_params = $url . '?' . http_build_query($params);



        // set url

        curl_setopt($ch, CURLOPT_URL, $url_with_params);



        //return the transfer as a string

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



        // $output contains the output string

        $output = curl_exec($ch);


        // close curl resource to free up system resources

        curl_close($ch);

        // libxml_use_internal_errors(true); // Enable internal error handling
        $xml = simplexml_load_string($output);
        $outputInArray = json_decode(json_encode($xml), true);

        dd($outputInArray);

        //     $responseFormat = [▼
        //         "@attributes" =>  [],
        //         "Errors" => [],
        //         "Warnings" => [],
        //         "RequestedCommand" => "namecheap.domains.check",
        //         "CommandResponse" => [],
        //         "Server" => "PHX01SBAPIEXT05",
        //         "GMTTimeDifference" => "--5:00",
        //         "ExecutionTime" => "0.01",
        // ];
        // For the responseFormat. if Errors key isn't empty then CommandResponse will not be present
    }
    public function getDomainPricing(Request $request)
    {
        // create curl resource

        $ch = curl_init();
        $url = 'https://' . env('NAMECHEAP_SERVICE_URL') . '/xml.response';
        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER'),
            'ApiKey' => env('NAMECHEAP_API_KEY'),
            'UserName' => env('NAMECHEAP_API_USER'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP'),
            'Command' => 'namecheap.users.getPricing', // this is dynamic
            'ProductType' => 'DOMAIN',
        ];
        $url_with_params = $url . '?' . http_build_query($params);



        // set url

        curl_setopt($ch, CURLOPT_URL, $url_with_params);



        //return the transfer as a string

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



        // $output contains the output string

        $output = curl_exec($ch);


        // close curl resource to free up system resources

        curl_close($ch);

        // libxml_use_internal_errors(true); // Enable internal error handling
        $xml = simplexml_load_string($output);
        $outputInArray = json_decode(json_encode($xml), true);

        dd($outputInArray);

        //     $responseFormat = [▼
        //         "@attributes" =>  [],
        //         "Errors" => [],
        //         "Warnings" => [],
        //         "RequestedCommand" => "namecheap.domains.check",
        //         "CommandResponse" => [],
        //         "Server" => "PHX01SBAPIEXT05",
        //         "GMTTimeDifference" => "--5:00",
        //         "ExecutionTime" => "0.01",
        // ];
        // For the responseFormat. if Errors key isn't empty then CommandResponse will not be present
    }
    public function getSslPricing(Request $request)
    {
        // create curl resource

        $ch = curl_init();
        $url = 'https://' . env('NAMECHEAP_SERVICE_URL') . '/xml.response';
        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER'),
            'ApiKey' => env('NAMECHEAP_API_KEY'),
            'UserName' => env('NAMECHEAP_API_USER'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP'),
            'Command' => 'namecheap.users.getPricing', // this is dynamic
            'ProductType' => 'SSLCERTIFICATE',
        ];
        $url_with_params = $url . '?' . http_build_query($params);



        // set url

        curl_setopt($ch, CURLOPT_URL, $url_with_params);



        //return the transfer as a string

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



        // $output contains the output string

        $output = curl_exec($ch);


        // close curl resource to free up system resources

        curl_close($ch);

        // libxml_use_internal_errors(true); // Enable internal error handling
        $xml = simplexml_load_string($output);
        $outputInArray = json_decode(json_encode($xml), true);

        dd($outputInArray);

        //     $responseFormat = [▼
        //         "@attributes" =>  [],
        //         "Errors" => [],
        //         "Warnings" => [],
        //         "RequestedCommand" => "namecheap.domains.check",
        //         "CommandResponse" => [],
        //         "Server" => "PHX01SBAPIEXT05",
        //         "GMTTimeDifference" => "--5:00",
        //         "ExecutionTime" => "0.01",
        // ];
        // For the responseFormat. if Errors key isn't empty then CommandResponse will not be present
    }
    public function addFunds(Request $request)
    {
        // create curl resource

        $ch = curl_init();
        $url = 'https://' . env('NAMECHEAP_SERVICE_URL') . '/xml.response';
        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER'),
            'ApiKey' => env('NAMECHEAP_API_KEY'),
            'UserName' => env('NAMECHEAP_API_USER'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP'),
            'Command' => 'namecheap.users.createaddfundsrequest', // this is dynamic
            'PaymentType' => 'Creditcard',
            'Amount' => 40,
            'ReturnUrl' => env('APP_URL') . '/response', // this is dynamic
        ];
        $url_with_params = $url . '?' . http_build_query($params);



        // set url

        curl_setopt($ch, CURLOPT_URL, $url_with_params);



        //return the transfer as a string

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



        // $output contains the output string

        $output = curl_exec($ch);


        // close curl resource to free up system resources

        curl_close($ch);

        // libxml_use_internal_errors(true); // Enable internal error handling
        $xml = simplexml_load_string($output);
        $outputInArray = json_decode(json_encode($xml), true);

        dd($outputInArray);

        //     $responseFormat = [▼
        //         "@attributes" =>  [],
        //         "Errors" => [],
        //         "Warnings" => [],
        //         "RequestedCommand" => "namecheap.domains.check",
        //         "CommandResponse" => [],
        //         "Server" => "PHX01SBAPIEXT05",
        //         "GMTTimeDifference" => "--5:00",
        //         "ExecutionTime" => "0.01",
        // ];
        // For the responseFormat. if Errors key isn't empty then CommandResponse will not be present
    }
}
