<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Client;

class GiphyTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test **/
    public function test_api_gives_response_from_giphy()
    {
        $api_key    = env('GIPHY_API_KEY');
        $client     =  new Client();
        $arguement  =  [
            'endpoint'=> 'search',
            'term'    => 'cat'   
        ];
        $url = 'https://api.giphy.com/v1/gifs/'.$arguement['endpoint'].'?q='.$arguement['term'];

        $res = $client->request('GET',  $url, [
        'headers'       => [
        'Accept'        => 'application/json',
        'Content-type'  => 'application/json',
        'apikey'        =>  $api_key,
        'Content-Type'  => 'application/xml',
        ]
       ]);
        $giphy = json_decode($res->getBody()->getContents());
        $this->assertEquals('OK', $giphy->meta->msg);
    }
 
}
