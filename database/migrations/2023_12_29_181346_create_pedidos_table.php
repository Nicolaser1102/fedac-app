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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();


            $table->foreignId('vendedor_id')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->nullOnDelete();


            $table->foreignId('id_UserVenta')
            ->nullable()
            ->constrained('users_ventas')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->enum('estado', ['Solicitado', 'En camino', 'Entregado']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
