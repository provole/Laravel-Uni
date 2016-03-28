@extends('layouts.layout')
@section('title')
{{$product->name}}
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
	{!!Form::open([
		'method' => 'delete',
		'route' => ['product.destroy', $product->id]
	])!!}
	<h1>{{$product->name}}</h1>
	<h4>{{$product->descr}}</h4>
	<h3>{{$product->price}}</h3>
	<img src="{{ asset($product->image) }}" height="150" width="100"/>

	<a href="{{route('product.edit', $product->id)}}">Edit</a>
	{!!Form::submit('Delete')!!}
	{!!Form::close()!!}
@stop