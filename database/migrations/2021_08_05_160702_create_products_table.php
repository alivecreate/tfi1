<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->text('name');
            $table->text('short_description');
            $table->text('full_description');
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->text('status')->default(0);
            $table->softDeletes();
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
}
