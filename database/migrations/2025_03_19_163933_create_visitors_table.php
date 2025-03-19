<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('tamu'); // nama user atau tamu
            $table->string('email')->nullable(); // email user, jika login
            $table->date('visit_date'); // tanggal kunjungan
            $table->string('page'); // halaman yang dibuka
            $table->unsignedBigInteger('item_id')->nullable(); // id item jika membuka detail item
            $table->string('item_judul')->nullable(); // judul item
            $table->string('item_kategori')->nullable(); // kategori item
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
