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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('username')->nullable();

            $table->tinyInteger('role')->default('2');
            $table->string('provider_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('isActive')->default('1');
            $table->rememberToken();
            $table->timestamps();
        });

          // Insert some stuff
          DB::table('users')->insert(
            array(
                [
                'name' => 'Waqas Ali',
                'email' => 'admin@gmail.com',
                'phone' => '03004439823',
                'password' => Hash::make('1234'),
                'role' => 1,
                'isActive' => 1,
                ],
                [
                'name' => 'Ali Afan',
                'email' => 'user@gmail.com',
                'phone' => '03007731712',
                'password' => Hash::make('1234'),
                'role' => 2,
                'isActive' => 1,
                ],


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
        Schema::dropIfExists('users');
    }
};
