<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Order_product;
use App\OrderProduct;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $order = Order::paginate(2);
      return view("orders.index",['orders'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("orders.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $iduser = Auth::id();
      $order= new Order;
      $order->user_id=$iduser;
      $order->status="Pendiente";
      $order->save();

      $idOrder= Order::all()->last();
      $idOrder = $idOrder->id;
      $shopping_cart=\Session::get('cart.orderProduct');
      foreach ($shopping_cart as $product){
        $orderProduct=new Order_product;
        $orderProduct->order_id=$idOrder;
        $orderProduct->product_id=$product->product_id;
        $orderProduct->qty=$product->qty;
        if($orderProduct->save())
        {
          \Session::forget('cart.orderProduct');
        }
        //$total = $total + ($product->price * $product->qty);
      }
      //Session::forget('cart.orderProduct');
      return redirect('/products');
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
      $order = Order::find($id);
      return view('orders.edit',['orders'=>$order]);
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
        $order = Order::find($id);
        $order->status = $request->status;
        if($order->save()){
          return redirect('/orders');
        }else {
          return view('orders.edit',['orders'=>$order]);
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
      Order::destroy($id);
      return redirect('/orders');
    }
}
