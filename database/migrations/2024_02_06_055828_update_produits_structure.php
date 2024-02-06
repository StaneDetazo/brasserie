<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():void{
        Schema::create('produits', function (Blueprint $table) {
            $table->id("id_produit");
            $table->String("libelle_produit");
            $table->float("prix_produit");
            $table->String("categorie_produit");
            $table->String("image");
            $table->integer("stock_produit");
            $table->integer("stock_critique");
            $table->unsignedBigInteger('gross_id'); // Clé etrangere du grossiste
            $table->timestamps();

            //Specification de la cle etrangere
            $table->foreign('gross_id')->references('id')->on('grossistes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
