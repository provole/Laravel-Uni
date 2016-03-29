@extends('layouts.layout')
@section('title')
Edit {{$product->name}}
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
@section('body')
		
	<div class="drob">
	<ul id="drop-nav">
		@if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
	
    <li><a href="#">Hello user</a>
  <li><a href="#">Hello user</a>
    <ul>
       <li><a href="{{ URL::to('/auth/logout')}}">Logout</a></li>
      
    </ul>
  </li>
  
		@endif
</ul>
		</div>
<Br><Br><br>
@include('layouts.menu')
	{!!Form::model($product, [
		'method' => 'patch',
		'route' => ['product.update', $product->id]
	])!!}
	
	{!!Form::label('name', 'Name')!!}
	{!!Form::text('name', $product->name, ['placeholder' => "Give a name"])!!}

	<br>

	{!!Form::label('price', 'Price')!!}
	{!!Form::text('price', $product->price, ['placeholder' => "Give a price"])!!}

	{!!Form::submit('Edit')!!}
	{!!Form::close()!!}
@stop