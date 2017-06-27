@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
<!-- Form -->
  {!!Form::open(['url' => '/categories/', 'method' => 'POST', 'class' => 'inline-block'])!!}

  Nombre de la categoria:
  {{Form::text('name','',['class'=>'form-control'])}}

  Descripción de la categoria:
  {{Form::textarea('description','',['class'=>'form-control'])}}

  <br>
  <input type="submit" class="btn btn-success" name="" value="Agregar">
  {!!Form::close()!!}
  @else
    Area restringida!!!
  @endif
@endsection
