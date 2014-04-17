<?php namespace App\Models\Repositories;

use App\Models\Interfaces\UserRepositoryInterface;
use App\Models\Eloquent\User;

class EloquentUserRepository implements UserRepositoryInterface {
    
    public function all()
    {
        return User::all()->toArray();
    }
    
    public function find($id)
    {
        return User::find($id)->toArray();
    }
    
    public function findByUsername($username)
    {
        return User::where('username', '=', $username)->first()->toArray();
    }
    
    public function store($data)
    {
        return User::create($data)->toArray();
    }
    
}