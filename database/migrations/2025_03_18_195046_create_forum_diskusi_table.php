<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('forum_diskusi', function (Blueprint $table) {
            $table->id();
            $table->text('pertanyaan');
            $table->string('tanggal'); // format dd/mm/yyyy, disimpan sebagai string
            $table->string('pengirim');
            $table->string('email_pengirim');
            $table->string('status')->default('Diproses');
            $table->text('balasan_admin')->nullable();
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_diskusi');
    }
};
