<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@showWelcome', 'as' => 'home'));

Route::get('deck/builder', array('uses' => 'DeckController@showBuilder', 'as' => 'deck.builder'));

// API Routes

require app_path() . '/apiv1routes.php';