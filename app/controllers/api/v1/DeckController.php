<?php namespace App\Controllers\Api\V1;

use Response, Input;

class DeckController extends ApiController {
    
    public function __construct(
        DeckRepositoryInterface $decks,
        Auth $auth,
        Response $response,
        Input $input
    )
    {
        $this->decks = $decks;
        $this->auth = $auth;
        $this->response = $response;
        $this->input = $input;
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
            $id = $this->decks->create($data);
            $return = $this->json_response_array(true, array('id' => $id));
        } else {
            $return = $this->json_response_array(false, $validation->messages());
        }
        
        return $this->response->json($return);
        
    }
    
    public function destroy($id)
    {
        $deck = $this->decks->find($id);
        
        if ($deck && !empty($deck)) {
            if ($deck['user_id'] == $this->auth->user()->id) {
                $this->decks->destroy($deck['id']);
                return $this->response->json($this->json_response_array(true));
            }
        }
        
        return $this->response->json($this->json_response_array(false));
    }
    
    public function decks_by_username($username)
    {
        return $this->response->json($this->json_response_array(true, $this->decks->getDecksByUsername($username)));
    }
    
}

