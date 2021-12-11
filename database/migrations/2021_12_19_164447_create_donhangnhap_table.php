<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhangnhap', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('donhangnhap_tong_tien', 18, 0);
            $table->string('donhangnhap_ghichu');
            $table->integer('nhacungcap_id')->unsigned();
            $table->foreign('nhacungcap_id')->references('id')->on('nhacungcap')->onDelete('cascade');
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
        Schema::dropIfExists('donhangnhap');
    }
}
