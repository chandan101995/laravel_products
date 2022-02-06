<?php

namespace App\Traits;

trait ProductTrait {

    /*
    *  check price value if greater than 100
    */
    public function checkPriceIfGreater(int $query){
        return $query < 100 ? true : false;
    } 
}
