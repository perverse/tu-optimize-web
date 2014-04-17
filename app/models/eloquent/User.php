<?php namespace App\Models\Eloquent;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;

class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    
    public function decks()
    {
        return $this->hasMany('App\Models\Eloquent\Deck', 'user_id', 'id');
    }

}