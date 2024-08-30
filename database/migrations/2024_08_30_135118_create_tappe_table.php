<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tappe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('giornata_id')->constrained('giornate')->onDelete('cascade');
            $table->string('titolo');
            $table->text('descrizione')->nullable();
            $table->string('immagine')->nullable();
            $table->decimal('latitudine', 10, 7);
            $table->decimal('longitudine', 10, 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tappe');
    }
};
