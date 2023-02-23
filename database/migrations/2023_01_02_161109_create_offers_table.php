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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('kind');
            $table->string('imported_desciption');
            $table->string('end_date');
            $table->string('code');
            $table->string('description');
            $table->string('short_title');
            $table->string('title');
            $table->string('store_id')->nullable();
            $table->string('is_active')->default(1);
            $table->string('user_id');
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
        Schema::dropIfExists('offers');
    }
};
