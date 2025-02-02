<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('program_name');
            $table->string('title');
            $table->text('description');
            $table->string('severity');
            $table->string('status')->default('new');
            $table->integer('points')->default(0);
            $table->string('user_uid');
        
            // Foreign key constraint
            $table->foreign('user_uid')->references('uid')->on('users')->onDelete('cascade');
        
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
