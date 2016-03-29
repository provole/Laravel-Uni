@extends('layouts.layout')
@section('title')
	Book Store
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>  
@section('body')
<div class = "menu">
<ul>
	@if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                        </li>
                    @endif
</ul>
	</div>
@include('layouts.menu')





@foreach($products as $i => $product)
@if($i==1)
<div class="homeinline">
<div class="one">
		<img src="{{ asset($product->image) }}" height="150" width="100"/> <br/>
		<a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a>
		<div class="bold">£{{ $product->price }}</div><br><br><br><br>
@endif
	</div>
	@endforeach

	
@foreach($products as $i => $product)
@if($i==2)
<div class="two">
		<img src="{{ asset($product->image) }}" height="150" width="100"/>
		<a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a><br/>
		<div class="bold">£{{ $product->price }} </div><Br> <br>  <br> 
			
@endif
</div>
	
	@endforeach

@foreach($products as $i => $product)
@if($i==3)
<div class="three">
		<img src="{{ asset($product->image) }}" height="150" width="100"/>
		<a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a><br/>
		<div class="bold">£{{ $product->price }} </div><Br> <br> 
			
@endif

	</div>	
	</div>	
	@endforeach	
	
	@foreach($products as $i => $product)
@if($i==4)
<div class="four">
		<img src="{{ asset($product->image) }}" height="150" width="100"/>
		<a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a><br/>
		<div class="bold">£{{ $product->price }} </div><Br> <br> <br>
			
@endif

	</div>	
	</div>	
	@endforeach	
@stop