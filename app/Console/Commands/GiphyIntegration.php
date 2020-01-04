<?php

namespace App\Console\Commands;
use GuzzleHttp\Client;
use Giphy;
use GuzzleHttp\Exception\GuzzleException;

use Illuminate\Console\Command;

class GiphyIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guzzle:giphy {endpoint} {term}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Integrate Giphy API with Guzzle';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$giphys   = Giphy::search('cat');
        $arguement = $this->arguments();
        
        $api_key = env('GIPHY_API_KEY');
        $client  =  new Client();
        try{
            $url     = 'https://api.giphy.com/v1/gifs/'.$arguement['endpoint'].'?q='.$arguement['term'];
            $res     = $client->request('GET',  $url, [
            'headers'       => [
            'Accept'        => 'application/json',
            'Content-type'  => 'application/json',
            'apikey'        =>  $api_key,
            'Content-Type'  => 'application/xml',
            ]
            ]);
       
            $giphy = json_decode($res->getBody()->getContents());
            $this->info('Congrates you have successfully integrated giphy API');
        }catch(GuzzleException $e){
            return $e;
        }
        
    }
}
