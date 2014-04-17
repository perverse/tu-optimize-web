<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CardFeedXml;

use Config;

class ServicesProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('App\Services\Interfaces\CardFeedParserInterface', function($app){
            $cardsxml = file_get_contents(Config::get('cardsync.save_path'));
            $cards = new \SimpleXMLElement($cardsxml);
            
            return new CardFeedXml($cards);
        });
    }

}
