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
		'sale',
		'user_id'
	
	];

	public $timestamps = false;

    protected $table = 'products';
	public function products(){
		return $this->belongsTo('App\Product', 'user_id');
	}
	public function books(){
		return $this->hasMany('App\Books');
	}
}
