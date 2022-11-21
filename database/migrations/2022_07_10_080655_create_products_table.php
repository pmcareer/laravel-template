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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');     
            $table->string('slug')->nullable();
            $table->string('product_code')->unique();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            
            //Required
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('product_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->integer('category_id'); //check category table it has parent_id for multiple levels 

            //Required
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->nullable();            
            $table->string('title');
            $table->string('value');

            //Required
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('products');
    }
};
