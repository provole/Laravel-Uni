@extends('layouts.layout')
@section('title')
	All products
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

@foreach($products as $product)
		<table>
	
			<tr>
				<td><a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a></td>
			<td>{{ $product->price }}</h3></td>
			</tr>
</table>
			<br>

	@endforeach

 @foreach($products as $i => $product)
@if($i==15)
		<h1><a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a></h1>
		<h3>{{ $product->price }}</h3>
		<img src="{{ $product->image }}">
		<br>
@endif
	@endforeach



	<a href="{{route('product.create')}}">Create</a>
	<a href="{{route('about')}}">About</a>
	<a href="{{route('contact')}}">Contact</a>
@stop