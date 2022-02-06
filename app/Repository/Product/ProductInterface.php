<?php

namespace App\Repository\Product;
use App\Models\Product;

/* 
* products method define in product interface 
*/
interface ProductInterface {
    public function getAllData();
    public function store($data);
    public function view($id);
    public function update($id, $data);
    public function delete($id);
}
