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
        Schema::create('tbl_sanpham', function (Blueprint $table) {
            $table->bigIncrements('pro_id');
            $table->string('pro_name');
            $table->integer('cate_id');
            $table->integer('thuonghieu_id');
            $table->text('pro_desc');
            $table->text('pro_content');
            $table->string('pro_price');
            $table->string('pro_image');
            $table->string('pro_status');
            
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
        Schema::dropIfExists('tbl_sanpham');
    }
};
