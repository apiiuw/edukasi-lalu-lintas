<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('electronics_books', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->integer('tahun_rilis');
            $table->text('deskripsi');
            $table->string('kata_kunci');
            $table->string('cover');
            $table->string('pdf');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('electronics_books');
    }
};
