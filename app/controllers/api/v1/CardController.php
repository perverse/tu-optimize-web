<?php namespace App\Controllers\Api\V1;

use App\Models\Interfaces\CardRepositoryInterface;
use Response, Input;

class CardController extends ApiController {
    
    public function __construct(
        CardRepositoryInterface $cards,
        Response $response,
        Input $input
    )
    {
        $this->cards = $cards;
        $this->response = $response;
        $this->input = $input;
    }
    
    public function index()
    {
        return $this->response->json($this->json_response_array(true, $this->cards->all()));
    }
    
}