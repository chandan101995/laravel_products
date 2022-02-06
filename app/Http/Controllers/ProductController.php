<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Repository\Product\ProductInterface;
use Illuminate\Http\Request;
use App\Traits\ProductTrait;
use App\Http\Requests\StorProduct;
use App\Http\Requests\UpdateProduct;
use App\Events\ProductCreated;

class ProductController extends Controller
{
    /* 
    * define traits method 
    */ 
	use ProductTrait;

    /* 
    * varibale define 
    */ 
	protected $product;

    /* 
    * product interface class call here
    */
	public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }
    
    /* 
    * products listing page 
    */
    public function index()
    {
       return view('Products.index',['products' => $this->product->getAllData()]);
	}
	
    /*
    *store product page view 
    */
    public function add()
    {
       return view('Products.Add');
	}
	
	/* 
    * store product 
    */
	public function store(StorProduct $request)
    {
		$data = $request->all();
        /* check price in traits method */
        $price = $this->checkPriceIfGreater($data['price']);
        if(!$price){
            return back()->with('error','Price Should be a less than 100!');
        }
		$response = $this->product->store($data);
		return redirect()->route('index')->with($response['status'],$response['message']);
    }
    
    /* 
    * edit products
    */ 
    public function view($id)
    {
        return view('Products.edit',['product' => $this->product->view($id)]);
    }
    
    /* 
    * update product
    */ 
    public function update(UpdateProduct $request, $id)
    {
        $data = $request->all();
        /* check price in traits method */
        $price = $this->checkPriceIfGreater($data['price']);
        if(!$price){
            return back()->with('error','Price Should be a less than 100!'); 
        }
        /* return value in response variable */
        $response =  $this->product->Update($id,$data);
		return redirect()->route('index')->with($response['status'],$response['message']);
    }
    
    /* 
    *delete product
    */
    public function delete($id)
    {
        $response =  $this->product->delete($id);
        return redirect()->route('index')->with($response['status'],$response['message']);
    }
}
