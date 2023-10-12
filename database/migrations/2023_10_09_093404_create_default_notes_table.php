<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('default_notes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('Заголовок заметки');
            $table->text('text')->nullable()->comment('Текст заметки');
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('default_notes');
    }
};
