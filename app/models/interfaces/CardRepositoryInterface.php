<?php namespace App\Models\Interfaces;

interface CardRepositoryInterface {
    
    public function all();
    public function find($id);
    public function findByName($name);
    public function store($data);
    public function allByType($type);
    
}
