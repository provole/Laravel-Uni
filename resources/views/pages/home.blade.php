@extends('layouts.layout')
@section('title')
	Home
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>  
@section('body')
<ul>
	@if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
                        
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} <span class="caret"></span></a>
                            <ul>
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                     
                    @endif
</ul>
@include('layouts.menu')
	<h1>This is the home page.</h1>
	


@stop
