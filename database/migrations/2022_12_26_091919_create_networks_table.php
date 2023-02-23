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
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('name');

            $table->string('is_active')->default(1);
            $table->string('user_id');
            $table->timestamps();
        });
        DB::table('networks')->insert(
            array(
                [
                'name' => 'Shareasale aka SAS',
                'slug' => phpslug('Shareasale aka SAS'),
                'is_active' => 1,
                'user_id' => 1,
                ],
                [
                'name' => 'Commission Junction aka CJ',
                'slug' => phpslug('Commission Junction aka CJ'),
                'is_active' => 1,
                'user_id' => 1,
                ],
                [
                'name' => 'Comission Function aka CF',
                'slug' => phpslug('Comission Function aka CF'),
                'is_active' => 1,
                'user_id' => 1,
                ],
                [
                    'name' => 'AWIN',
                    'slug' => phpslug('AWIN'),
                    'is_active' => 1,
                    'user_id' => 1,
                ],
                    [
                        'name' => 'Impact Radius aka IR',
                        'slug' => phpslug('Impact Radius aka IR'),
                        'is_active' => 1,
                        'user_id' => 1,
                    ],
                        [
                            'name' => 'Rakuten Advertising aka LS',
                            'slug' => phpslug('Rakuten Advertising aka LS'),
                            'is_active' => 1,
                            'user_id' => 1,
                        ],
                            [
                                'name' => 'Refersion aka REF',
                                'slug' => phpslug('Refersion aka REF'),
                                'is_active' => 1,
                                'user_id' => 1,
                            ],
                                [
                                    'name' => 'Webgains aa WG',
                                    'slug' => phpslug('Webgains aa WG'),
                                    'is_active' => 1,
                                    'user_id' => 1,
                                ],
                                    [
                                        'name' => 'Admitad',
                                        'slug' => phpslug('Admitad'),
                                        'is_active' => 1,
                                        'user_id' => 1,
                                    ],

                                        [
                                            'name' => 'Ascen by Partnerize aka PPJ',
                                            'slug' => phpslug('Ascen by Partnerize aka PPJ'),
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
        Schema::dropIfExists('networks');
    }
};
