<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'name',
		'price',
		'descr',
		'image'
	
	];

	public $timestamps = false;

    protected $table = 'products';
}
