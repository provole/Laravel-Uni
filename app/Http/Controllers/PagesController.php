<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class PagesController extends Controller
{
    public function getIndex(){
        return view('welcome');
    }

    public function getAbout(){
		$companyName = "Code Executable Inc";
		$isUserRegistered = false;

		$users = array("Renato", "Erik", "John", "Samantha");

        return view('pages.about')
        	->with("companyName", $companyName)
        	->with("isUserRegistered", $isUserRegistered)
        	->with("users", $users);
    }

    public function getContact(){
        return view('pages.contact');
    }
	
	public function getHome(){
        return view('pages.home');
    }
	
	 
}