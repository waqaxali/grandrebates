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
        Schema::create('storesubcategories', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('store_id')->nullable();
            $table->tinyInteger('category_id')->nullable();
            $table->tinyInteger('subcategory_id')->nullable();
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
        Schema::dropIfExists('storesubcategories');
    }
};
