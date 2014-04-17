<?php namespace App\Controllers\Api\V1;

use App\Models\Interfaces\DeckRepositoryInterface;
use Response, Input, Auth;

class DeckController extends ApiController {
    
    public function __construct(
        DeckRepositoryInterface $decks,
        Auth $auth,
        Response $response,
        Input $input
    )
    {
        // Dependancy Injection
        $this->decks = $decks;
        $this->auth = $auth;
        $this->response = $response;
        $this->input = $input;
        
        // Filters
        $this->beforeFilter('Sentinel\csrf', array('on' => 'post'));
    }
    
    public function index()
    {
        return $this->response->json(
            $this->json_response_array(true, $this->decks->all())
        );
    }
    
    public function store()
    {
        $data = $this->input->get();
        $validation = $this->decks->validate($data);
        
        if ($validation->passes()) {
            $deckid = $this->decks->create($data);
            $return = $this->json_response_array(true, array('id' => $deckid));
        } else {
            $return = $this->json_response_array(false, $validation->messages());
        }
        
        return $this->response->json($return);   
    }
    
    public function show($deckid)
    {
        $this->response->json(
            $this->json_response_array(true, $this->decks->find($deckid))
        );
    }
    
    public function destroy($deckid)
    {
        $deck = $this->decks->find($deckid);
        
        if ($deck && !empty($deck)) {
            if ($deck['user_id'] == $this->auth->user()->id) {
                $this->decks->destroy($deck['id']);
                return $this->response->json($this->json_response_array(true));
            }
        }
        
        return $this->response->json($this->json_response_array(false));
    }
    
    public function decks_by_username()
    {
        return $this->response->json($this->json_response_array(true, $this->decks->decksByUsername($this->input->get('username'))));
    }
    
}

