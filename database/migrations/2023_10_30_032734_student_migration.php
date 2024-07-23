<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('candid')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();
            $table->string('photo')->nullable();
            $table->string('schoolid')->nullable();
            $table->string('room')->nullable();
            $table->string('seat')->nullable();
            $table->string('kessgrade')->nullable();
            $table->string('mathgrade')->nullable();
            $table->string('biolgrade')->nullable();
            $table->string('geoggrade')->nullable();
            $table->string('histgrade')->nullable();
            $table->string('morcivgrade')->nullable();
            $table->string('chemgrade')->nullable();
            $table->string('physgrade')->nullable();
            $table->string('earthgrade')->nullable();
            $table->string('lang_grade')->nullable();
            $table->double('percentile')->nullable();
            $table->integer('letternumber')->nullable();
            $table->string('pass')->nullable();
            $table->string('grade')->nullable();
            $table->integer('program')->nullable();
            $table->integer('candtypecode')->nullable();
            $table->string('examcenter')->nullable();
            $table->string('provincek')->nullable();
            $table->string('programkh')->nullable();
            $table->string('genderl')->nullable();
            $table->string('pprefixk')->nullable();
            $table->string('provinceks')->nullable();
            $table->string('schoolnamekh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
