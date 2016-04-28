<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('products',function(Blueprint $table){
    $table->increaments('id');
    $table->string('name');
    $table->integer('user_id')->unsigned();
    //and so on ...

    $table->foreign('user_id')
            ->references('users')
            ->on('id')
            ->onDelete('cascade');
}); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
