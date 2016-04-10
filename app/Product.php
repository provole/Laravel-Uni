<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'name',
		'price',
		'descr',
		'image',
		'sale'
	
	];

	public $timestamps = false;

    protected $table = 'products';
}
