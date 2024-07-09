<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations
     */
    public function up(): void
    {
        Schema::create('disponibilidade', function (Blueprint $table) {
            $table->id();
            $table->date('data_base')->required()->unique()->index();
            $table->decimal('saldo_financeiro', 12, 2)->nullable();
            $table->decimal('restos_pagar', 12, 2)->nullable();
            $table->decimal('empenhado_pagar', 12, 2)->nullable();
            $table->decimal('duodecimo_repassar', 12, 2)->nullable();
            $table->decimal('outras_obrigacoes', 12, 2)->nullable();
            $table->decimal('disponivel_bruto', 12, 2)->nullable();
            $table->decimal('reservas', 12, 2)->nullable();
            $table->decimal('disponivel_liquido', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilidade');
    }
};
