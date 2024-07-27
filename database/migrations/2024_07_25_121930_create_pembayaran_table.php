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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis');
            $table->string('nama');
            $table->string('petugas');
            $table->bigInteger('jenis_pembayaran');
            $table->enum('is_expense', ['Y', 'N']);
            $table->integer('nominal');
            $table->date('date');
            $table->enum('status', ['unpaid', 'paid']);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_jenis')->references('id')->on('jenis_pembayaran')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
