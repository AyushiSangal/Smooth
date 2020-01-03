<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Giphy;
use Illuminate\Http\Request;

class GiphyController extends Controller
{
    public function index(Request $request){

        $endpoint   = $request->input('endpoint');
        $term       = $request->input('term');
        $api_key    = env('GIPHY_API_KEY');
        $client     =  new Client();
        $url        = 'https://api.giphy.com/v1/gifs/'.$endpoint.'?q='.$term;

       // dd($url);
        $res = $client->request('GET',  $url, [
        'headers'       => [
        'Accept'        => 'application/json',
        'Content-type'  => 'application/json',
        'apikey'        =>  $api_key,
        'Content-Type'  => 'application/xml',
        ]
       ]);
        $giphy = json_decode($res->getBody()->getContents());
       return $giphy->data;
    }
}
