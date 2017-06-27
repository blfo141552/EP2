@extends('layouts.app')
@section('content')
<div class="container">
  @foreach($products as $product)
  <div class="col-md-4">
    <br>
    <h3>{{$product->name}}</h3>
    <p>{{$product->description}}</p>
  <!--!  {!!Form::open(['url'=>'/categories/','method'=>'POST','class'=>'inline-block'])!!}-->
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <input type="hidden" name="product_name" value="{{$product->name}}">
    <input type="hidden" name="product_description" value="{{$product->description}}">
    <br><br>
    @if(Auth::user()->admin())
      <a onclick ="eliminarCategory({{$product->id}})"class="btn btn-danger">Eliminar</a>
      <a href="{{url('/categories/'.$product->id.'/edit')}}" class="btn btn-danger">Editar</a>
    @endif

  </div>
  @endforeach
  <div class="col-xs-12" style="text-align:center">
    {{$products->links()}}
  </div>
</div>
@endsection
