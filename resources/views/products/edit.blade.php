@extends('layouts.layout')
@section('title')
Edit {{$product->name}}
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
	{!!Form::model($product, [
		'method' => 'patch',
		'route' => ['product.update', $product->id]
	])!!}
	
	{!!Form::label('name', 'Name')!!}
	{!!Form::text('name', $product->name, ['placeholder' => "Give a name"])!!}

	<br>

	{!!Form::label('price', 'Price')!!}
	{!!Form::text('price', $product->price, ['placeholder' => "Give a price"])!!}

	{!!Form::submit('Edit')!!}
	{!!Form::close()!!}
@stop