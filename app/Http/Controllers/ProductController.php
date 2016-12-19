<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product :: all();
      return view('products.index') -> with ('products', $products);
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
      $this-> validate($request,[
                'name' => 'required',
                'description' => 'required',
                'stock' => 'required',
                'price' => 'required',

              ]);
              Product :: create($request->all());
              return redirect('product/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      $product = Product :: find($product->id);
      return view('/products/show') -> with ('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      $product = Product:: find($product->id);
      return view('products/edit') -> with ('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      $this-> validate($request,[
        'name' => 'required',
        'description' => 'required',
        'stock' => 'required',
        'price' => 'required',

      ]);

      $product = Product::find($product->id);
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->stock = $request->input('stock');
      $product->price = $request->input('price');
      $product->save();
      return view('products/show')-> with ('product',$product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product = Product:: find($product->id);

      $product ->delete();

      return redirect('product/');
    }
}
