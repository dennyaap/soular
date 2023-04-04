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
        Schema::create('paintings', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->string('title');
            $table->double('price');
            $table->text('description');
            $table->double('width');
            $table->double('height');
            $table->date('date_creation');
            $table->timestamps();

            $table->foreignId("artist_id")->constrained("artists")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("style_id")->constrained("styles")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("material_id")->constrained("materials")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("plot_id")->constrained("plots")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("technique_id")->constrained("techniques")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paintings');
    }
};