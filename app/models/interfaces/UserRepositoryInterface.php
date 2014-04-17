<?php namespace App\Models\Interfaces;

interface UserRepositoryInterface {
    
    public function all();
    public function find($id);
    public function findByUsername($name);
    public function store($data);
    
}