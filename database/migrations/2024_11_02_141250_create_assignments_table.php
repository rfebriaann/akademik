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
        if (! Schema::hasTable('assignments')) {
            Schema::create('assignments', function (Blueprint $table) {
                $table->id();
                $table->string('nama_tugas');
                $table->text('deskripsi')->nullable();
                $table->dateTime('batas_waktu');
                $table->string('file')->nullable();
                $table->unsignedBigInteger('course_id');
                $table->unsignedBigInteger('created_by'); // dosen yang membuat tugas
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
                $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
