@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
    {!!Form::open(['url' => '/orders/'.$orders->id,'method' => 'PATCH', 'class' => 'inline-block']) !!}
      Estado de la orden:
      {{Form::text('status',$orders->status,['class'=>'form-control'])}}
      <br><br>
      <input type="submit" class="btn btn-success" name="" value="Guardar">
    {!! Form::close() !!}
@else
  Area restringida!!
@endif
@endsection
