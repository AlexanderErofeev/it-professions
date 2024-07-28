<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('short_description');
            $table->text('example');
            $table->text('image_path');
            $table->text('occupation');
            $table->text('history');
            $table->text('demanded_industries');
            $table->text('career');
            $table->text('description_count_vacancies');
            $table->text('description_salary');
            $table->boolean('is_have_statistics');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('professions');
    }
};
