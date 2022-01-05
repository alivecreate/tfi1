<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_list', function (Blueprint $table) {
            $table->id();

            $table->text('item_no')->nullable();
            $table->text('item_id')->nullable();
            $table->text('name')->nullable();
            $table->text('type')->nullable();
            $table->text('url')->nullable();
            $table->integer('status')->default(0)->nullable();
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
        Schema::dropIfExists('url_list');
    }
}
