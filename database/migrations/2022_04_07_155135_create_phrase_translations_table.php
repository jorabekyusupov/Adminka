<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhraseTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('phrase_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('object_id');
            $table->string('language_code', 15);
            $table->string('translation')->nullable();
            $table->index('object_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phrase_translations');
    }
}
