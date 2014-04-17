<?php namespace App\Models\Eloquent;

use Eloquent;

class Card extends Eloquent {

	protected $table = 'cards';
    
    public function decks()
    {
        return $this->belongsToMany('App\Models\Eloquent\Deck', 'deck_cards', 'card_id', 'deck_id');
    }
    
}