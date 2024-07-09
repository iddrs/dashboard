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
        Schema::create('asps', function (Blueprint $table) {
            $table->id();
            $table->date('data_base')->required()->unique()->index();
            $table->decimal('receita_bc', 12, 2)->nullable();
            $table->decimal('despesa_bc', 12, 2)->nullable();
            $table->decimal('perc_minimo', 8, 4)->nullable();
            $table->decimal('perc_apurado', 8, 4)->nullable();
            $table->decimal('vl_minimo', 12, 2)->nullable();
            $table->decimal('vl_diferenca', 8, 4)->nullable();
            $table->text('fonte')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asps');
    }
};
