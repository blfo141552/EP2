@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
<!-- Form -->
  {!!Form::open(['url' => '/categories/'.$product->id, 'method' => 'PATCH', 'class' => 'inline-block', 'files' => true])!!}


  Nombre de la categoria:
  {{Form::text('name',$product->name,['class'=>'form-control'])}}

  Descripción de la categoria:
  {{Form::textarea('description',$product->description,['class'=>'form-control'])}}

  <br>
  <input type="submit" class="btn btn-success" name="" value="Guardar">
  {!!Form::close()!!}
  @else
    Area restringida!!!
  @endif
@endsection
