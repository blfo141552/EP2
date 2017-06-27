@extends('layouts.app')
@section('content')
<!-- Form -->
  {!!Form::open(['url' => '/orders/', 'method' => 'POST', 'class' => 'inline-block'])!!}

  Estado de la orden:
  {{Form::label('status','Pendiente',['class'=>'form-control'])}}
  <input type="submit" class="btn btn-success" name="" value="Confirmar pedido">
  
  {!!Form::close()!!}
@endsection
