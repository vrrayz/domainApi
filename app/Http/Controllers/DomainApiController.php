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
