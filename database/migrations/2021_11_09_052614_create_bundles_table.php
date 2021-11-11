<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundles', function (Blueprint $table) {
            $table->id();
            $table->longText('bundle_name', 255)->nullable(true);
            $table->longText('bundle_product_name', 255)->nullable(true);
            $table->longText('bundle_product_id', 255)->nullable(true);
            $table->longText('bundle_product_img', 255)->nullable(true);
            $table->longText('design_header_product_img', 255)->nullable(true);
            $table->longText('design_header_product_img_width', 255)->nullable(true);
            $table->longText('bundle_product_title', 255)->nullable(true);
            $table->string('design_product_image', 255)->nullable(true);
            $table->longText('design_product_images_url', 255)->nullable(true);
            $table->longText('notes', 255)->nullable(true);
            $table->string('bundle_token');
            $table->string('store_name', 255)->nullable(true);
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
        Schema::dropIfExists('bundles');
    }
}
