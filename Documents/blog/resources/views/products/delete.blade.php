@if(Auth::user()->admin())
<!-- Form -->
{!!Form::open(['url' => '/products/'.$product->id, 'method' => 'DELETE', 'class' => 'inline-block'])!!}
<input type="submit" class="btn btn-link red-text no-padding no-margin no-transform" name="" value="DELETE">
{!!Form::close()!!}
@else
  Area restringida!!!
@endif
