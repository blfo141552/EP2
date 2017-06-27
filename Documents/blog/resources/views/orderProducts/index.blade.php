@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
<div class="container">
  <div class="rows">
    <h1><center>Odenes de productos</center></h1><br><br>
    @foreach ($orderProducts as $orderProducts)
    <div class="col-md-4">
      <p>ID orde: {{$orderProducts->order_id}}</p>
      <p>ID product: {{$orderProducts->product_id}}</p>
      <p>Cantidad: {{$orderProducts->qty}}</p>
        <a onclick ="eliminarOrderProduct({{$orderProducts->id}})"class="btn btn-danger">Eliminar</a>
        <a class="btn btn-success" href="{{url('/orderProducts/'.$orderProducts->id).'/edit'}}">Editar</a>
      </div>
    @endforeach
    </p><br>
  </div>
</div>
@else
  Area restringida!!!
@endif
@endsection
