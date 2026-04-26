<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //menjalankan migrasi untuk membuat tabel posts
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->timestamps();
            
        });
    }

    //menjalankan migrasi untuk menghapus tabel posts
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropColumn('image');
        });
        Schema::dropIfExists('posts');
    }
};
