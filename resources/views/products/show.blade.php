 <!-- specific product ID page -->
@extends('layouts.layout')
@section('title')
{{$product->name}}
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
@section('body')
		
	<div class="drob">
	<ul id="drop-nav">
	 <!-- display nav if user not logged in-->
		@if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
	
   <!-- display nav if user logged in + user's name -->
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
	@if (Auth::guest())  <!-- restrict access to id page if user not logged in -->
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
       
                    @else
                     <!-- restrict access only if product id===user -->
	{!!Form::open([ 
		'method' => 'delete',
		'route' => ['product.destroy', $product->id]
	])!!}
	<h1>{{$product->name}}</h1>
	<h4>{{$product->descr}}</h4>
	<h3>{{$product->price}}</h3>
	<img src="{{ asset($product->image) }}" height="150" width="100"/>
	 <!-- edit only if product id=== user  -->
	@if(Auth::id() == $product->user_id)
	<a href="{{route('product.edit', $product->id)}}">Edit</a>
	@endif
	
	@if(Auth::id() == $product->user_id)  <!-- delete only if product id === user -->
	{!!Form::submit('Delete')!!}  <!-- destroy item -->
	@endif
	{!!Form::close()!!}  <!-- closing form -->
	@endif
@stop