<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Order_product;

class OrderProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orderProducts = Order_product::paginate(2);
      return view("orderProducts.index",['orderProducts'=>$orderProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $shopping_cart=\Session::get('cart.orderProduct');
      foreach ($shopping_cart as $product){
        $orderProduct=new Order_product;
        $orderProduct->order_id=$order_id;
        $orderProduct->product_id=$product->product_id;
        $orderProduct->qty=$product->qty;
        $orderProduct->save();
      }
      //$total = $total + ($product->price * $product->qty);
      //Session::forget('cart.orderProduct');
      return redirect('/orderProducts');
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
      $orderProducts = Order_product::find($id);
      return view('orderProducts.edit',['orderProducts'=>$orderProducts]);
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
      $orderProducts = Order_product::find($id);
      $orderProducts->qty = $request->qty;
      if($orderProducts->save()){
        return redirect('/orderProducts');
      }else {
        return view('orderProducts.edit',['orderProducts'=>$orderProducts]);
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
      Order_product::destroy($id);
      return redirect('/orderProducts');
    }
}
