<?php namespace App\Models\Interfaces;

interface DeckRepositoryInterface {
    
    public function all();
    public function find($id);
    public function store($data);
    public function getDecksByUsername($username);
    public function getDeckByUsernameAndSlug($username, $slug);
    public function generateSlug($name, $userId);
    public function destroy($deckId);
    public function validate($data);
    
}
