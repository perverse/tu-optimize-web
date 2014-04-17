<?php namespace App\Services;

use App\Services\Interfaces\CardFeedParserInterface;
use SimpleXMLElement;

class CardFeedXml implements CardFeedParserInterface {
    
    private $is_parsed = false;
    
    private $units = array();
    
    public function __construct(SimpleXMLElement $cards)
    {
        $this->cards = $cards;
    }
    
    public function parse()
    {
        if (!$this->is_parsed) {
            
            foreach ($this->cards as $object) {
                
                $objectType = $object->getName();

                if ($objectType == 'unit') {
                    $this->units[(int) $object->id] = array(
                        'name' => (string) $object->name,
                        'type' => $this->getCardType($object),
                        'external_id' => (int) $object->id
                    );
                }
                
            }
            
        }
        return $this;
    }
    
    public function getCardType($object)
    {
        switch ((string) $object->set) {
            case 7000:
            case '7000':
                $ret = "commander";
                break;
            default:
                $ret = "card";
                break;
        }
        return $ret;
    }
    
    public function getCards()
    {
        return $this->units;
    }
    
}

