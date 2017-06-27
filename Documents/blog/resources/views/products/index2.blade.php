@extends('layouts.app')
@section('content')
@if(Auth::user()->admin()){
  <div class="container">
    <div class="rows">
      <h1><center>PRODUCTOS</center></h1>
      @foreach ($products as $product)
      <div class="col-md-4">
        <h3>{{$product->name}}</h3>
        <h4>{{$product->price}}</h4>
        <p>{{$product->description}}</p>
        <div class="col-md-12">
          <img style="height:150px;" class="col-xs-12"src="/images/products/{{$product->image}}" alt="img-responsive"/>
        </div><br>
        <a href="{{url('/products/'.$product->id).'/edit'}}"class="btn btn-success">Editar</a>
        <a onclick ="eliminarProducto({{$product->id}})"class="btn btn-danger">Eliminar</a>
        <br><br>
      </div>
      @endforeach
      <div class="col-xs-12">
        {{$products->links()}}
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a href="{{ url('/home')}}"><h1>Página principal</h1></a>
      </div>
    </div>
  </div>
@else
<div class="container">
  <div class="rows">
    <h1><center>PRODUCTOS</center></h1>
    <div class="col-xs-12">
      @foreach($shopping_cart as $product)
      {{$product->name}} {{$product->price}}
      @endforeach
    </div>
    <div class="col-xs-12">
      número de productos {{$productsSize}}
      total a pagar: {{$total}}
    </div>
    @foreach ($products as $product)

    <div class="col-md-4">
      <h3>{{$product->name}}</h3>
      <h4>{{$product->price}}</h4>
      <p>{{$product->description}}</p>
      {!!Form::open(['url'=>'/shopping_carts/','method'=>'POST', 'class'=>'inline-block'])!!}
      <div class="col-md-12">
        <img style="height:150px;" class="col-xs-12"src="/images/products/{{$product->image}}" alt="img-responsive"/>
      </div>
      <input type="hidden" name="product_id" value="{{$product->id}}">
      <input type="hidden" name="product_name" value="{{$product->name}}">
      <input type="hidden" name="product_price" value="{{$product->price}}">
      <input type="hidden" name="product_description" value="{{$product->description}}">

      <br><label>Cantidad</label>
      <input type="number" name="qty">
      <input type="submit" class="col-xs-12 btn btn-success" name="" value="Agregar al carrito"><br><br>
      {!!Form::close()!!}

      </div>
    @endforeach
    <div class="col-xs-12">
      {{$products->links()}}
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Launch demo modal
      </button>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Pedidos</h4>
            </div>
            <div class="modal-body">
              @foreach($shopping_cart as $product)
              {{$product->name}} {{$product->price}}
              @endforeach
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              {!!Form::open(['url' => '/orders/', 'method' => 'POST', 'class' => 'inline-block']) !!}
              <input type="submit" class="btn btn-primary" value="Confirmar Pedido">
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>

      <a href="{{ url('/home')}}"><h3>Página principal</h3></a>
    </div>
  </div>
</div>
@endif
@endsection
