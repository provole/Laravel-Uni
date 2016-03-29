@extends('layouts.layout')
@section('title')
	All products
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






@foreach($products as $product)

	
				<div class="inline">
				<img src="{{ asset($product->image) }}" height="150" width="100"/>
				<a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a>
					<div class="bold2">£{{ $product->price }}</div>
					
				</div>
			


	@endforeach

 @foreach($products as $i => $product)
@if($i==15)
		<h1><a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a></h1>
		<h3>{{ $product->price }}</h3>
		<img src="{{ $product->image }}">
		<br>
@endif
	@endforeach



@stop