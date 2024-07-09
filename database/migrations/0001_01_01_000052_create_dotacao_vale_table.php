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
        Schema::create('dotacao_vale', function (Blueprint $table) {
            $table->id();
            $table->date('data_base')->required()->unique()->index();
            $table->decimal('dotacao_atualizada', 12, 2)->nullable();
            $table->decimal('dotacao_necessaria', 12, 2)->nullable();
            $table->decimal('resultado', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('dotacao_vale');
    }
};
