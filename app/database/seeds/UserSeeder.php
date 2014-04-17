<?php

use App\Models\Interfaces\UserRepositoryInterface;

class UserSeeder extends Seeder {

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }
    
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();
        
        $this->users->store(array(
            'username' => 'test_user',
            'email' => 'test@user.com',
            'password' => \Hash::make('testpassword')
        ));
	}

}