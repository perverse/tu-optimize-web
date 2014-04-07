<?php

class Card extends Eloquent {

	protected $table = 'cards';
    
    public function save()
    {
        if (!$this->class_name) $this->class_name = get_class($this);
        
        parent::save();
    }
    
}