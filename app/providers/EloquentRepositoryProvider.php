<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EloquentRepositoryProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('App\Models\Interfaces\DeckRepositoryInterface', 'App\Models\Repositories\EloquentDeckRepository');
        $this->app->bind('App\Models\Interfaces\CardRepositoryInterface', 'App\Models\Repositories\EloquentCardRepository');
        $this->app->bind('App\Models\Interfaces\UserRepositoryInterface', 'App\Models\Repositories\EloquentUserRepository');
    }

}

