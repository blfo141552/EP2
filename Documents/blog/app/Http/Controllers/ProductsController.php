<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order_product;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /* dar permisos*/
    public function __construct()
    {
       //$this->middleware('admin');
    }


    public function index()
    {
      $shopping_cart = \Session::get('cart.orderProduct');
      if($shopping_cart){
        $total = Order_product::total();
        $productsSize = Order_product::productsSize();
      }else {
        $total = 0;
        $productsSize = 0;
        $shopping_cart = array();
      }
      $products = Product::paginate(2);
        return view("products.index",['shopping_cart'=>$shopping_cart,'total'=>$total,'productsSize'=>$productsSize,'products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::pluck('name','id');
        return view("products.create",["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $categories= Category::pluck('name','id');
        if ($product->save()) {
          return redirect('/products');
        }else {
          return view('products.create',['categories'=>$categories]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('name','id');
        $product = Product::find($id);
        return view('products.edit',['categories'=>$categories,'product'=>$product]);
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
        $categories = Category::pluck('name','id');
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        //Image
        if($request->file('image')){
          $file = $request->file('image');
          $name = $product->id.'_'.time().'.'.$file->getClientOriginalExtension();
          $path = public_path().'/images/products/';
          $file->move($path,$name);
          $product->image = $name;
        }
        if ($product->save()) {
          return redirect('/products');
        }else {
          return view('products.edit',['categories'=>$categories,'product'=>$product]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/products');
    }
}
