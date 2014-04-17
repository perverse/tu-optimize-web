<?php namespace App\Models\Repositories;

use App\Models\Interfaces\DeckRepositoryInterface;
use App\Models\Eloquent\Deck;
use App\Models\Eloquent\User;
use Str, Validator;

class EloquentDeckRepository implements DeckRepositoryInterface {
    
    public $rules = array(
        'name' => 'required',
        'user_id' => 'required|integer',
        'cards' => 'required|arraymin:1|arraymax:10'
    );
    
    public function all()
    {
        return Deck::all()->toArray();
    }
    
    public function find($id)
    {
        return Deck::find($id)->toArray();
    }
    
    public function store($data)
    {
        $deck = Deck::create(array(
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'slug' => $this->generateSlug($data['name'], $data['user_id'])
        ));
        
        $count = 0;
        
        foreach ($data['cards'] as $cardId) {
            $deck->cards()->attach($cardId, array('deck_order' => $count));
            $count++;
        }
        
        return $deck->toArray();
    }
    
    public function getDecksByUsername($username)
    {
        return Deck::where('username', '=', $username)->get()->toArray();
    }
    
    public function getDeckByUsernameAndSlug($username, $slug)
    {
        return Deck::whereHas('user', function($q) use ($username) {
            $q->where('username', '=', $username);
        })->where('slug', '=', $slug)->first()->toArray();
    }
    
    public function generateSlug($name, $userId)
    {
        $slug = Str::slug($name, '-');
        $slugCount = count(Deck::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->where('user_id', '=', $userId)->get());
        
        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
    
    public function destroy($deckId)
    {
        Deck::destroy($deckId);
        return true;
    }
    
    public function deckUserId($deckId)
    {
        $deck = Deck::find($deckId);
        
        if ($deck) {
            return $deck->user_id;
        } else {
            return NULL;
        }
    }
    
    public function validate($data)
    {
        return Validator::make($data, $rules);
    }
    
    public function decksByUsername($username)
    {
        return User::where('username', '=', $username)->first()->decks()->get()->toArray();
    }
    
}