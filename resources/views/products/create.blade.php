

@extends('layouts.layout') <!-- layout for page-->
@section('title') 
Create new Product
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>  
@section('body')



	<div class="drob">
	<ul id="drop-nav">
		<!--displays nav if not logged in -->
		@if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
	
 <!-- displays nav if logged in + display user's name-->
   <li><a href="#">Hello, @if( Auth::check() )
	 {{ Auth::user()->name}}

	@endif</a> 
    <ul>
       <li><a href="{{ URL::to('/auth/logout')}}">Logout</a></li>
      	<li><a href="{{ URL::to('/tasks')}}">Reading</a></li><br/>
    </ul>
  </li>
  
		@endif
		
</form>
</ul>
		</div>
<Br><Br><br>

	@include('layouts.menu')

	{!!Form::open(['route' => 'product.store'])!!} <!-- Form open for sales page. -->
	{!! Form::hidden('user_id', Auth::id()) !!}  <!-- input user_id -->
	{!!Form::label('name', 'Name')!!}
	{!!Form::text('name', null, ['placeholder' => "Name of book"])!!} <!-- Name field-->

	<br>

	{!!Form::label('descr', 'Descr')!!}
	{!!Form::text('descr', null, ['placeholder' => "Description"])!!} <!-- Description field-->
	<br>
	{!!Form::label('price', 'Price')!!}
	{!!Form::text('price', "0£", ['placeholder' => "Price"])!!} <!-- Price Field -->
	<br>
	{!! Form::label('image', 'Choose an image') !!} <!-- Image field-->
    {!! Form::file('image', null) !!}


	{!!Form::submit('Create')!!}<!-- submit form/ create -->

	{!!Form::close()!!} <!--close -->
@stop