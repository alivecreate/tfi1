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
            $table->text('type')->nullable();
            $table->text('title')->nullable();
            $table->text('target')->nullable();
            $table->text('url')->nullable();
            $table->text('status')->default(0)->nullable();
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
