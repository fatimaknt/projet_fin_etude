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
        Schema::create('produit_user', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('produit_id');
        $table->unsignedBigInteger('user_id');
        // Ajoutez d'autres colonnes si nécessaire
        $table->timestamps();

        $table->foreign('produit_id')->references('id')->on('produits');
        $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_user');
    }
};
