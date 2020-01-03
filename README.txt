Package Used : 
    "guzzlehttp/guzzle": "^6.5",
    "laravel/framework": "^6.2",
    "romeroqe/giphy-and-stickers": "dev-master"  , Used to call Giphy API with Laravel Giphy facade
    "phpunit/phpunit": "^8.0"  , Used to build test-cases



Created a controller file which will return response from Giphy i.e : 
Note:  Taking giphy API key from Laravel Environment file. 

Installation:
 Run "composer update", to install all Package


To run Test case:
   Use: ./vendor/bin/PHPUnit /tests/Feature/GiphyTest


Two Ways to run:
1st: With URL  (e.g:  <BASEURL>/api/giphy?endpoint=<END_POINT>&term=<TERM_TO_SEARCH>), Used controller & Laravel routing
    Example URL: http://SmoothTest.test/api/giphy?endpoint=search&term=cat  
        Here:Parameter 1 : Endpoint  (possible value : search, trending) , As per GIPHY various search points:  https://developers.giphy.com/docs/api/endpoint#search
        Parameter 2 : Search text (Giphy image we want  to search e.g:  Cat,  Dog etc)

2nd:With Terminal: e.g: "php artisan guzzle:giphy <END_POINT> <TERM_TO_SEARCH>"   (2 parameter: 1st: endpoint, 2nd: Term to search)
            e.g: "php artisan guzzle:giphy search cat"  
