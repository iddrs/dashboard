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
        Schema::create('fundeb', function (Blueprint $table) {
            $table->id();
            $table->date('data_base')->required()->unique()->index();
            $table->decimal('arrecadado_anterior_mes', 12, 2)->nullable();
            $table->decimal('previsto_loa_mes', 12, 2)->nullable();
            $table->decimal('arrecadado_mes', 12, 2)->nullable();
            $table->year('exercicio')->nullable();
            $table->decimal('arrecadado_anterior_acum', 12, 2)->nullable();
            $table->decimal('previsto_loa_acum', 12, 2)->nullable();
            $table->decimal('arrecadado_acum', 12, 2)->nullable();
            $table->decimal('dif_mes_arrec_ant_vl', 12, 2)->nullable();
            $table->decimal('dif_mes_arrec_prev_vl', 12, 2)->nullable();
            $table->decimal('dif_mes_arrec_ant_perc', 8, 4)->nullable();
            $table->decimal('dif_mes_arrec_prev_perc', 8, 4)->nullable();
            $table->decimal('dif_acum_arrec_ant_vl', 12, 2)->nullable();
            $table->decimal('dif_acum_arrec_prev_vl', 12, 2)->nullable();
            $table->decimal('dif_acum_arrec_ant_perc', 8, 4)->nullable();
            $table->decimal('dif_acum_arrec_prev_perc', 8, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundeb');
    }
};
