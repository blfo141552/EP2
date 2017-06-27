@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
    {!!Form::open(['url' => '/orderProducts/'.$orderProducts->id,'method' => 'PATCH', 'class' => 'inline-block']) !!}
      Cantidad:
      {{Form::text('qty',$orderProducts->qty,['class'=>'form-control'])}}
      <br><br>
      <input type="submit" class="btn btn-success" name="" value="Guardar">
    {!! Form::close() !!}
@else
  Area restringida!!
@endif
@endsection
