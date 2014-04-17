<?php

use App\Models\Interfaces\DeckRepositoryInterface;

class DeckSeeder extends Seeder {

    public function __construct(DeckRepositoryInterface $decks)
    {
        $this->decks = $decks;
    }
    
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('decks')->delete();
        
        $this->decks->store(array(
            'name' => 'Deck 1',
            'user_id' => 1,
            'cards' => array(1, 1, 1, 2, 3, 3)
        ));
        
        $this->decks->store(array(
            'name' => 'Crag Spam',
            'user_id' => 1,
            'cards' => array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1)
        ));
        
        $this->decks->store(array(
            'name' => 'Char Spam',
            'user_id' => 1,
            'cards' => array(3, 3, 3, 3, 3)
        ));
	}

}