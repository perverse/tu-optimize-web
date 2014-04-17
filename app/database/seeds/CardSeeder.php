<?php

use App\Models\Interfaces\CardRepositoryInterface;

class CardSeeder extends Seeder {

    public function __construct(CardRepositoryInterface $cards)
    {
        $this->cards = $cards;
    }
    
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('cards')->delete();
        
        $this->cards->store(array(
            'name' => 'Bolt Crag',
            'external_id' => 1
        ));
        
        $this->cards->store(array(
            'name' => 'Noble Defiance',
            'external_id' => 2
        ));
        
        $this->cards->store(array(
            'name' => 'Charincinerator',
            'external_id' => 3
        ));
	}

}