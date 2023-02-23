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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('country_name');
            $table->string('is_active');
            $table->string('user_id');
            $table->timestamps();
        });
        DB::table('countries')->insert(
            array(
                [
                'country_name' => 'US',
                'slug' => 'US',
                'is_active' => 1,
                'user_id' => 1,
                ],
                [
                'country_name' => 'UK ',
                'slug' => 'UK',
                'is_active' => 1,
                'user_id' => 1,
                ],
                [
                'country_name' => 'PAK',
                'slug' => 'PAK',
                'is_active' => 1,
                'user_id' => 1,
                ],
                [
                    'country_name' => 'AUS',
                    'slug' => 'AUS',
                    'is_active' => 1,
                    'user_id' => 1,
                ],
                    [
                        'country_name' => 'SAUD',
                        'slug' => 'SAUD',
                        'is_active' => 1,
                        'user_id' => 1,
                    ]


            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
