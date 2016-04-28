 <!-- THIS IS THE ALL BOOKS PAGE-->

@extends('layouts.layout')
@section('title')
	All products
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>  
@section('body')

		
	<div class="drob">
	<ul id="drop-nav">
	 <!-- display nav if user not logged in -->
		@if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
	
    <!-- display nav if user logged in + user's name-->
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

@foreach($products as $product)

	
				<div class="inline"> 
				<img src="{{ asset($product->image) }}" height="150" width="100"/>  <!--displays product image -->
				<a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a>  <!-- display product name + url to product id -->
					<div class="bold2">£{{ $product->price }}</div>  <!-- display price -->
					
				</div>
			


	@endforeach

{!!$products->render()!!}  <!-- pagination render -->

<!--
{!!$products->render()!!} -->
	

	
@stop