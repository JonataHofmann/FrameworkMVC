<?php

namespace App\Model;

use App\Core\Model;
use App\Model\Phone;


class Candidate extends Model{

    protected $table = "candidates";
    
    public function phones(){
        $phoneModel = new Phone();
        $result = $phoneModel->where('candidate_id', $this->id);
       return $result;  
    }

}
