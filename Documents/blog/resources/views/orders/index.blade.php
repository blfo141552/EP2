@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
<div class="container">
  <div class="rows">
    <h1><center>Ordenes</center></h1><br><br>

    @foreach ($orders as $order)
    <div class="col-md-4">
      {!!Form::open(['url'=>'/orders/','method'=>'POST','class'=>'inline-block'])!!}
      <input type="hidden" name="id" value="{{$order->id}}" >
      <input type="hidden" name="user_id" value="{{$order->user_id}}" >
      <input type="hidden" name="status" value="{{$order->status}}" >
      <p>ID de order: {{$order->id}}</p>
      <p>ID de usuario: {{$order->user_id}}</p>
      <p>Estado del pedido: {{$order->status}}</p>
        <a class="btn btn-success" href="{{url('/orders/'.$order->id).'/edit'}}">Editar</a>
        {!! Form::close() !!}
      </div>
    @endforeach
    <div class="col-xs-12" style="text-align:center">
      {{$orders->links()}}
    </div>
    </p><br>
  </div>
</div>
@else
    <h1>No debes de estar aqui prro!</h1>
@endif
@endsection
