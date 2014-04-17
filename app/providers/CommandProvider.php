<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Commands\PopulateCardDatabase;

class CommandProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('cards.populate', function($app){
            return new PopulateCardDatabase;
        });
    }

}
