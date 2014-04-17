<?php namespace App\Models\Repositories;

use App\Models\Interfaces\CardRepositoryInterface;
use App\Models\Eloquent\Card;

class EloquentCardRepository implements CardRepositoryInterface {
    
    public function all()
    {
        return Card::all()->toArray();
    }
    
    public function find($id)
    {
        return Card::find($id)->toArray();
    }
    
    public function findByName($name)
    {
        return Card::where('name', '=', $name)->first()->toArray();
    }
    
    public function store($data)
    {
        return Card::create($data)->toArray();
    }
    
}