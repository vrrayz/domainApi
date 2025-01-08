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
            'Command' => 'namecheap.domains.check',
            'ClientIp' => env('NAMECHEAP_CLIENT_IP')
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

        dd($output);
    }
}
