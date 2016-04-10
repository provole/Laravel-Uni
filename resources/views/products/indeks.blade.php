@extends('layouts.layout')
@section('title')
	Book Store
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>  
@section('body')
	
		
	<div class="drob">
	<ul id="drop-nav">
		@if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
	
    
  <li><a href="#">Hello, @if( Auth::check() )
	 {{ Auth::user()->name}}
	@endif</a> 
    <ul>
       <li><a href="{{ URL::to('/auth/logout')}}">Logout</a></li>
      
    </ul>
  </li>
  
		@endif
</ul>
		</div>
<Br><Br><br>

@include('layouts.menu')



<!--
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
	
	</div>	
	@endforeach	
	
	-->


@foreach($products as $product)

	
				<div class="inline">
				<img src="{{ asset($product->image) }}" height="150" width="100"/>
				<a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a>
					<div class="bold2">£{{ $product->price }}</div>
					
				</div>
			


	@endforeach
@stop