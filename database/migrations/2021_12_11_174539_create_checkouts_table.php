<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('dari')->nullable();
            $table->longText('alamat_jemput')->nullable();
            $table->string('rekening')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('penumpang')->nullable();
            $table->string('payment')->nullable();
            $table->string('total_dibayar')->nullable();
            $table->string('status_dibayar')->nullable();
            $table->string('status_pembatalan')->nullable();
            $table->string('kode_pembayaran')->nullable();
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
        Schema::dropIfExists('checkout');
    }
}
