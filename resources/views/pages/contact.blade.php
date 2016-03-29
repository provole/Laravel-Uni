@extends('layouts.layout')

@section('title')
	About Us
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

	<h1>This is the contact page.</h1>
	<input type="text">

	{!! Form::text('price', '50$', [
		'class' => "form-control",
		'placeholder' => "Give a price"
	]) !!}

	{!! Form::number('level', 10, [
		'max' => 20,
		'min' => -5
	]) !!}
@stop
