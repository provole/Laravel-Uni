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
		
		$products = Product::paginate(3);
		
		
	
        return view('products.index')->with('products', $products);
		
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
		$product->descr = $request->descr;
		$product->descr = $request->image;
        $product->save();
        */
        $inputs = $request->all();

        $product = Product::Create($inputs);

        return redirect()->action('ProductController@index');
        //return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product', $product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Product::destroy($id);
        $product = Product::find($id)
            ->delete();

        return redirect()->route('product.index');
    }
}
