<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Commands\PopulateCardDatabase;
use App\Commands\DownloadCardXml;

class CommandProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('cards.populate', 'App\Commands\DownloadCardXml');
        $this->app->bind('cards.download', 'App\Commands\PopulateCardDatabase');
    }

}
