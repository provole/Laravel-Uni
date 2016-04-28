 <!-- simple about page-->
@extends('layouts.layout')

@section('title')
	About
 
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>  
@section('body')
		
	<div class="drob">
	<ul id="drop-nav">
	 <!-- if user is not logged in display this nav-->
		@if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
	
   <!-- display this nav if user logged in + user's name -->
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


@include('layouts.menu')  <!-- about description-->
<p>Welcome to the Book store. Here you can see a wide range books as well as sell your own.</p>


