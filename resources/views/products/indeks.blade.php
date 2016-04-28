 <!-- THIS IS THE HOME PAGE! -->

@extends('layouts.layout')
@section('title')
	Book Store
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>  
@section('body')
	
		
	<div class="drob">
	<ul id="drop-nav">
	 <!-- display nav if user is not logged in-->
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




 <!-- Home page/ display the bestsellers-->
<p>Bestsellers.</p>
@foreach($products as $product)  <!-- display books-->

	
				<div class="inline">  <!-- css styling/ not important -->
				<img src="{{ asset($product->image) }}" height="150" width="100"/>  <!-- product image -->
				<a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a>  <!-- product name + url to specific product id-->
					<div class="bold2">£{{ $product->price }}</div>
					
				</div>
			


	@endforeach
@stop