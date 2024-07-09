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
        Schema::create('despesa_corrente', function (Blueprint $table) {
            $table->id();
            $table->date('data_base')->required()->unique()->index();
            $table->decimal('emp_anterior_mes', 12, 2)->nullable();
            $table->decimal('receita_corrente_mes', 12, 2)->nullable();
            $table->decimal('emp_mes', 12, 2)->nullable();
            $table->year('exercicio')->nullable();
            $table->decimal('emp_ant_acum', 12, 2)->nullable();
            $table->decimal('receita_corrente_acum', 12, 2)->nullable();
            $table->decimal('emp_acum', 12, 2)->nullable();
            $table->decimal('dif_emp_ant_mes_vl', 12, 2)->nullable();
            $table->decimal('dif_emp_ant_mes_perc', 8, 4)->nullable();
            $table->decimal('dif_emp_receita_mes_vl', 12, 2)->nullable();
            $table->decimal('dif_emp_receita_mes_perc', 8, 4)->nullable();
            $table->decimal('dif_emp_ant_acum_vl', 12, 2)->nullable();
            $table->decimal('dif_emp_ant_acum_perc', 8, 4)->nullable();
            $table->decimal('dif_emp_receita_acum_vl', 12, 2)->nullable();
            $table->decimal('dif_emp_receita_acum_perc', 8, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('despesa_corrente');
    }
};
