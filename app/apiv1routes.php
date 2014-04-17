<?php

Route::group(array('prefix' => 'api'), function()
{
    // Deck API
    $deckCtrl = 'App\Controllers\Api\V1\DeckController';
        
    Route::get('deck', "{$deckCtrl}@index");
    Route::post('deck', "{$deckCtrl}@store");
    Route::get('deck/{id}', "{$deckCtrl}@show")->where('id', '[0-9]+');
    Route::get('deck/search', "{$deckCtrl}@decks_by_username");
    Route::delete('deck/{id}', "{$deckCtrl}@destroy");
    
    // Card API
    $cardCtrl = 'App\Controllers\Api\V1\CardController';
    
    Route::get('card', "{$cardCtrl}@index");
});