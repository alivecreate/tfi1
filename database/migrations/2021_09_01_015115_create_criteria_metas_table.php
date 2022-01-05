<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_metas', function (Blueprint $table) {
            $table->id();
            $table->text('item_no')->nullable();
            $table->text('categories')->nullable();
            $table->text('products')->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('criteria_id');
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');

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
        Schema::dropIfExists('criteria_metas');
    }
}
