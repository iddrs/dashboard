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
        Schema::create('dtp', function (Blueprint $table) {
            $table->id();
            $table->date('data_base')->required()->unique()->index();
            $table->decimal('rcl', 12, 2)->nullable();
            $table->decimal('dtp', 12, 2)->nullable();
            $table->decimal('perc_apurado', 8, 4)->nullable();
            $table->decimal('perc_limite_alerta', 8, 4)->nullable();
            $table->decimal('vl_limite_alerta', 12, 2)->nullable();
            $table->decimal('perc_limite_prudencial', 8, 4)->nullable();
            $table->decimal('vl_limite_prudencial', 12, 2)->nullable();
            $table->decimal('perc_limite_legal', 8, 4)->nullable();
            $table->decimal('vl_limite_legal', 12, 2)->nullable();
            $table->text('fonte')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dtp');
    }
};
