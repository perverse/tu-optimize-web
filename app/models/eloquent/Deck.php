<?php namespace App\Models\Eloquent;

use Eloquent;

class Deck extends Eloquent {

	protected $table = 'decks';
    
    protected $with = array('cards');
    
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
    
    public function cards()
    {
        return $this->belongsToMany('App\Models\Eloquent\Card', 'deck_cards', 'deck_id', 'card_id')
                    ->withPivot('deck_order')
                    ->orderBy('pivot_deck_order', 'ASC');
    }
    
}