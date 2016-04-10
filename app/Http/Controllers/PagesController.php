<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
class PagesController extends Controller
{
    public function getIndex(){
        return view('welcome');
    }

    public function getAbout(){
		
      
			
	return view('pages.about')
        	
			
	
    }

    public function getContact(){
        return view('pages.contact');
    }
	
	public function getHome(){
        return view('pages.home');
    }
	
	 
}