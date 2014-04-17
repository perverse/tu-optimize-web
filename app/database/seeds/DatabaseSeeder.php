<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CardSeeder');
        $this->call('DeckSeeder');
        //$this->call('UserSeeder');
	}

}