@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
<!-- Form -->
  {!!Form::open(['url' => '/products/', 'method' => 'POST', 'class' => 'inline-block'])!!}

  Nombre del producto:
  {{Form::text('name','',['class'=>'form-control'])}}

  Descripción del producto:
  {{Form::textarea('description','',['class'=>'form-control'])}}

  Precio del producto:
  {{Form::text('price','',['class'=>'form-control'])}}

  Categoría del producto:
  {{
    Form::select('category_id',$categories,['class'=>'form-control'])
  }}
  <br>
  <input type="submit" class="btn btn-success" name="" value="Agregar">
  {!!Form::close()!!}
@else
  Area restringida!!!
@endif
@endsection
