<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
             $table->string('title')->nullable();
             $table->string('slug')->nullable();
             $table->string('image')->nullable();
             $table->longText('description');
             $table->tinyInteger('status')->default('1')->comment('1=publish,0=unpublish');
             $table->bigInteger('category_id')->unsigned()->index()->nullable();
             $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
