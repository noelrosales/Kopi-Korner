<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_type');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('address');
            $table->string('username');
            $table->string('contact_no');
            $table->string('email');
            $table->string('password');
            $table->string('status');
            $table->string('api_token', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('discount', function (Blueprint $table) {
            $table->increments('discount_id');
            $table->string('discount_type');
            $table->string('percent_vat');
            $table->string('vat_status');
            $table->string('percent_discount');
            $table->string('discount_status');
            $table->timestamps();
        });

        Schema::create('uom', function (Blueprint $table) {
            $table->increments('uom_id');
            $table->string('uom_val');
            $table->string('description');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_name');
            $table->string('category_description');
            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('category_id');
            $table->string('product_name');
            $table->string('product_description');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('product_price', function (Blueprint $table) {
            $table->increments('product_price_id');
            $table->integer('product_id');
            $table->integer('uom_id');
            $table->integer('price');
            $table->string('promo_product');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('transaction_header', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->integer('user_id');
            $table->dateTime('transaction_date');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('receipt', function (Blueprint $table) {
            $table->increments('receipt_id');
            $table->integer('receipt_no');
            $table->integer('transaction_id');
            $table->integer('total_amount');
            $table->integer('vat');
            $table->integer('discount');
            $table->timestamps();
        });

        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->increments('transaction_detail_id');
            $table->string('transaction_id');
            $table->string('product_price_id');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('discount');
        Schema::dropIfExists('uom');
        Schema::dropIfExists('category');
        Schema::dropIfExists('product');
        Schema::dropIfExists('product_price');
        Schema::dropIfExists('transaction_header');
        Schema::dropIfExists('receipt');
        Schema::dropIfExists('transaction_detail');

    }
}
