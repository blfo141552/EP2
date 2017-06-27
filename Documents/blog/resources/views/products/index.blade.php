@extends('layouts.app')
@section('content')
<div class="container">

  <div class="col-xs-12">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ver carrito</button>
  </div>
<!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Compras</h4>
        </div>
        <div class="modal-body">
          <div class="col-xs-12">
            Nombre del producto: &nbsp&nbsp Precio:
            @foreach($shopping_cart as $product)
            <li>
              {{$product->name}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                    ${{$product->price}}
            </li>
            @endforeach
          </div>
          <div class="col-xs-12">
            número de productos {{$productsSize}}
            total a pagar:{{$total}}
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <a href="{{url('/orders/create')}}" class="btn btn-success">Realizar Pedido</a>
        </div>
      </div>

    </div>
  </div>

  @foreach($products as $product)
  <div class="col-md-4">
    <br>
    <img style="height:150px;" class="col-xs-12" src="/images/products/{{$product->image}}" alt="img-responsive">
    <br><br>
    <h3>{{$product->name}}</h3>
    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>
    {!!Form::open(['url'=>'/shopping_carts/','method'=>'POST','class'=>'inline-block'])!!}

    <input type="hidden" name="product_id" value="{{$product->id}}" >
    <input type="hidden" name="product_name" value="{{$product->name}}" >
    <input type="hidden" name="product_price" value="{{$product->price}}">
    <input type="hidden" name="product_description" value="{{$product->description}}">

    <label>Cantidad</label>
    <input type="number" name="qty" value="1">
    <br><br>
    <input type="submit" class="btn-success" name="" value="Agregar al carrito">
    @if(Auth::user()->admin())
      <a onclick ="eliminarProducto({{$product->id}})" class="btn btn-danger">Eliminar</a>
      <a href="{{url('/products/'.$product->id.'/edit')}}" class="btn btn-danger">Editar</a>

    @endif
    {!! Form::close() !!}
  </div>
  @endforeach
  <div class="col-xs-12" style="text-align:center">
    {{$products->links()}}
  </div>
</div>
@endsection
