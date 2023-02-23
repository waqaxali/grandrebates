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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('name');

            $table->string('description')->nullable();
            $table->string('description_bottom')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('cover_image')->nullable();

            $table->string('category_type');
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
        Schema::dropIfExists('categories');
    }
};
