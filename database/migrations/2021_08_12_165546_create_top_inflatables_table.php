<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopInflatablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_inflatables', function (Blueprint $table) {
            $table->id();
            $table->text('item_no')->nullable();
            $table->text('item_id')->nullable()->unique();
            $table->text('image')->nullable();
            $table->text('title')->nullable();
            $table->text('type')->nullable();
            $table->text('url')->nullable();
            $table->integer('status')->default(0);
            
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
        Schema::dropIfExists('top_inflatables');
    }
}
