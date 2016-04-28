@extends('layouts.layout')
@section('title')
Edit {{$product->name}}
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
@section('body')
		<!-- displays nav if not logged in -->
	<div class="drob">
	<ul id="drop-nav">
		@if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
	
     <!-- displays nav if logged in + user's name -->
 <li><a href="#">Hello, @if( Auth::check() )
	 {{ Auth::user()->name}}
	@endif</a> 
    <ul>
       <li><a href="{{ URL::to('/auth/logout')}}">Logout</a></li>
      <li><a href="{{ URL::to('/tasks')}}">Reading</a></li><br/>
    </ul>
  </li>
  
		@endif
</ul>
		</div>
<Br><Br><br>
@include('layouts.menu')  
 <!-- form for edit -->
	{!!Form::model($product, [ 
		'method' => 'patch',
		'route' => ['product.update', $product->id]
	])!!}
	
	{!!Form::label('name', 'Name')!!}  <!-- edit name-->
	{!!Form::text('name', $product->name, ['placeholder' => "Name"])!!}

	<br>

	{!!Form::label('price', 'Price')!!} <!-- edit price -->
	{!!Form::text('price', $product->price, ['placeholder' => "Price"])!!}

	{!!Form::submit('Edit')!!}  <!-- edit product id -->
	{!!Form::close()!!}  <!--closing form -->
@stop