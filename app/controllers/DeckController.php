<?php

class DeckController extends BaseController {
    
    public function __construct()
    {
    }
    
    public function showBuilder()
    {
        return View::make('front.deckbuilder');
    }
    
}