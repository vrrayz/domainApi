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



        // set url

        curl_setopt($ch, CURLOPT_URL, "example.com");



        //return the transfer as a string

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



        // $output contains the output string

        $output = curl_exec($ch);



        // close curl resource to free up system resources

        curl_close($ch);

        dd($output);
    }
}
