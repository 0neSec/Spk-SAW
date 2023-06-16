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
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alternatif');
            $table->text('deskripsi');
            $table->double('harga', 15, 8)->nullable()->default(123.4567);
            $table->double('kualitas', 15, 8)->nullable()->default(123.4567);
            $table->double('berat', 15, 8)->nullable()->default(123.4567);
            $table->double('iso', 15, 8)->nullable()->default(123.4567);
            $table->double('resolusi', 15, 8)->nullable()->default(123.4567);
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
        Schema::dropIfExists('alternatif');
    }
};
