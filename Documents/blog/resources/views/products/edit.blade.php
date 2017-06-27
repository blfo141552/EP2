@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
<!-- Form -->
  {!!Form::open(['url' => '/products/'.$product->id, 'method' => 'PATCH', 'class' => 'inline-block', 'files' => true])!!}
  Imagen del producto:
  {!! Form::file('image') !!}

  Nombre del producto:
  {{Form::text('name',$product->name,['class'=>'form-control'])}}

  Descripción del producto:
  {{Form::textarea('description',$product->description,['class'=>'form-control'])}}

  Precio del producto:
  {{Form::text('price',$product->price,['class'=>'form-control'])}}

  Categoría del producto:
  {{
    Form::select('category_id',$categories,['class'=>'form-control'])
  }}
  <br>
  <input type="submit" class="btn btn-success" name="" value="Guardar">
  {!!Form::close()!!}
@else
  Area restringida!!!
@endif
@endsection
