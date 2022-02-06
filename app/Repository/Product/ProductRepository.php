<?php

namespace App\Repository\Product;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductInterface { 
      
    /* 
    * get all products 
    */
    public function getAllData(){
        DB::beginTransaction();
        try {
            return Product::latest()->get();   
        } catch(\Exception $e) { 
            /* An error occured; cancel the transaction */
            DB::rollback();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
	
	/* 
    * product store in database 
    */
    public function store($data){
        DB::beginTransaction();
        try {
            $product = new Product();
            $product->title = $data['title'];
            $product->user_name = $data['user_name'];
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->description = $data['description'];
            $product->save();
            /* Commit the transaction */
            DB::commit();
            return ['status' => 'success', 'message' => 'Product added successfully'];
        } catch(\Exception $e) { 
            /* An error occured; cancel the transaction */
            DB::rollback();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }    
    }
	
	/* 
    * product edit  
    */ 
    public function view($id){
        DB::beginTransaction();
        try {
            return Product::find($id);
        } catch(\Exception $e) { 
            /* An error occured; cancel the transaction */
            DB::rollback();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }    
    }
    
	/* 
    * product update 
    */ 
    public function update($id, $data){
        DB::beginTransaction();
        try {
            $product = Product::find($id);
            $product->title = $data['title'];
            $product->user_name = $data['user_name'];
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->description = $data['description'];
            $product->save();
            /* Commit the transaction */
            DB::commit();
            return ['status' => 'success', 'message' => 'Product Updated successfully'];
        } catch(\Exception $e) { 
            /* An error occured; cancel the transaction */
            DB::rollback();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }    
    }
    
    /* 
    * product delete 
    */  
    public function delete($id){
        DB::beginTransaction();
        try {
            Product::find($id)->delete();
            /* Commit the transaction */
            DB::commit();
            return ['status' => 'success', 'message' => 'Product Deleted successfully'];
        } catch(\Exception $e) { 
            /* An error occured; cancel the transaction */
            DB::rollback();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
