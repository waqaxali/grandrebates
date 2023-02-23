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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('role',50);
            $table->text('description');
            $table->timestamps();
        });
        DB::table('roles')->insert(
            array(
                [
                'title' => 'Admin',
                'role' => 'isAdmin',
                'description' => 'This is the super admin role',
                ],
                [
                    'title' => 'User',
                    'role' => 'isUser',
                    'description' => 'This is the user role',
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
        Schema::dropIfExists('roles');
    }
};
