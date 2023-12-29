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
        Schema::create('users_ventas', function (Blueprint $table) {
            $table->id();


            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->string('codVenta');

            $table->foreign('codVenta')
            ->references('codigoVenta')->on('ventas');
            // ->constrained('ventas')
            // ->cascadeOnUpdate()
            // ->nullOnDelete();


            // $table->('categorie_id')

            $table->double('total',5,2);
            $table->string('direccion');
            $table->string('numTelefono');
            $table->enum('estado', ['porAceptar', 'aceptado']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_ventas');
    }
};
