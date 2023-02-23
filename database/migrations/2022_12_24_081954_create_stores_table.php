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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('store_name');
            $table->tinyInteger('network_type')->default(1)-nullable(); //1:Network, 2:Skimlink, 3: VGlinks
        //    $table->Integer('use_network')->nullable();
        //     $table->Integer('use_skimlinks')->nullable();
        //     $table->Integer('use_viglink')->nullable();
            $table->Integer('cashback_commission')->nullable();
            $table->string('network_cashback')->nullable();
            $table->string('network_commission')->nullable();
            $table->Integer('network_flat_switch')->nullable();
            $table->string('network_flat_rate')->nullable();
            $table->string('skimlinks_min')->nullable();
            $table->string('skimlinks_max')->nullable();
            $table->string('skimlinks_flat_rate')->nullable();

            $table->string('status')->default(1)->nullable();

            $table->string('homepage_url')->nullable();
            $table->string('affliated_url')->nullable();
            $table->text('show_store_description')->nullable();
            $table->text('store_main_description')->nullable();
            $table->text('description_about_section')->nullable();
            $table->string('custom_cashback_title')->nullable();
            $table->string('custom_cashback_subtitle')->nullable();
            $table->string('custom_commission_title')->nullable();
            $table->string('custom_commission_subtitle')->nullable();
            $table->string('logo')->nullable();
            $table->string('featured_image')->nullable();
            $table->tinyInteger('show_serp')->default(0)->nullable();
            $table->tinyInteger('scrap_promocodes')->default(0)->nullable();
            $table->tinyInteger('show_amazon')->default(0)->nullable();

            $table->string('instagram_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();

            $table->string('custom_h1')->nullable();
            $table->string('slug_suffix')->nullable();
            $table->string('referral_slug')->nullable();
            $table->string('custom_meta_title')->nullable();
            $table->string('custom_meta_description')->nullable();

            $table->tinyInteger('subscription')->default(0)->nullable(); //0:basic and 1:premium
            $table->string('amount')->nullable();
            $table->string('store_notes')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('is_active')->default(1);
            $table->string('user_id');
            $table->string('country_id');
            $table->string('category_id');
            $table->string('network_id');


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
        Schema::dropIfExists('stores');
    }
};
