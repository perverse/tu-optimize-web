<?php namespace App\Controllers\Api\V1;

use Controller;

class ApiController extends Controller {
    
    public function json_response_array($success, $data=array()) {
        
        if ($success) {
            $return = array(
                'success' => true,
                'result' => $data
            );
        } else {
            $return = array(
                'success' => false,
                'errors' => $data
            );
        }
        
        return $return;
        
    }
    
}