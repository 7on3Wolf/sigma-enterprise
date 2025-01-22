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
        Schema::create('contact_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pengadu
            $table->string('phone'); // Nomor telepon pengadu
            $table->text('message'); // Pesan pengaduan
            $table->timestamps(); // Menyimpan waktu pengaduan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_complaints');
    }
};