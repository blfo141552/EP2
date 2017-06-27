@extends('layouts.app')
@section('content')
<div class="container">
  <div class="rows">
    {!!Form::open(['url' => '/addresses/','method' => 'POST', 'class' => 'inline-block']) !!}
      Dirección:
      {{  Form::text('street','',['class'=>'form-control'])  }}
      Código postal:
      {{  Form::text('postcode','',['class'=>'form-control'])  }}
      Barrio:
      {{  Form::text('neighborhood','',['class'=>'form-control'])  }}
      Ciudad:
      {{  Form::text('city','',['class'=>'form-control'])  }}
    <input type="submit" class="btn btn-success" value="Guardar">
    {!! Form::close() !!}
    <a href="{{ url('/home') }}">Home</a>
  </div>
</div>
@endsection
