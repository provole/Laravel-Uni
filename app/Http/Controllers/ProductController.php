<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
class ProductController extends Controller
{
	public function __construct()
    {
       

        $this->middleware('auth', ['only' => ['create', 'store']]);
		
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function index(Request $request)
    {

        /*$products = Product::paginate(3);*/
		
		$products = Product::paginate(6); /* splits products to only 6 in a page.*/ 
		
		
	
        return view('products.index')->with('products', $products);  /*  returns view with products..*/
		
		
    }
 /* CRUD -  create */ 
    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)   
    {
     
        $inputs = $request->all();

        $product = Product::Create($inputs);

        return redirect()->action('ProductController@index');
        
        //return redirect()->route('product.index');
    }

 /* displays page with product id */ 
    public function show($id) 
    {
        $product = Product::find($id);

        return view('products.show')->with('product', $product);  /* passing product to the view in order to use it.  */
    }

 /* CRUD -  update */ 
    public function edit($id)
    {
        $product = Product::find($id);  /* retrieve product, finding ID */

        return view('products.edit', compact('product', $product));
    }


    public function update(Request $request, $id)  /*  product is the model. The model connects directly to products table inside the database*/
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('product.index'); /*  redirect to index after editing a product.*/
    }

	/*  CRUD - DELETE*/
 
    public function destroy($id)
    {
        //Product::destroy($id);
        $product = Product::find($id)  /* retrieve model, passing id and deleting. */
            ->delete();

        return redirect()->route('product.index');   /*  redirect to index after deleting a product.*/
	/*  CRUD - DELETE*/
    }
}
