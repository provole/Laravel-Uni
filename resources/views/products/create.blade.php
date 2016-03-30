

@extends('layouts.layout')
@section('title')
Create new Product
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

	{!!Form::open(['route' => 'product.store'])!!}

	{!!Form::label('name', 'Name')!!}
	{!!Form::text('name', null, ['placeholder' => "Give a name"])!!}

	<br>

	{!!Form::label('descr', 'Descr')!!}
	{!!Form::text('descr', null, ['placeholder' => "Give a descr"])!!}
	<br>
	{!!Form::label('price', 'Price')!!}
	{!!Form::text('price', "0$", ['placeholder' => "Give a price"])!!}
	<br>
	{!! Form::label('image', 'Choose an image') !!}
    {!! Form::file('image', null) !!}


	{!!Form::submit('Create')!!}

	{!!Form::close()!!}
@stop