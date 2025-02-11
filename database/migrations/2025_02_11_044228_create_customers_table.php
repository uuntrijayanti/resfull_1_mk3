<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pelanggan
            $table->string('email')->unique(); // Email pelanggan
            $table->string('phone')->nullable(); // Nomor telepon
            $table->text('address')->nullable(); // Alamat pelanggan
            $table->date('birthdate')->nullable(); // Tanggal lahir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
