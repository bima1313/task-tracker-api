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
        Schema::create('personal_access_token', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('tokenable_id')->constrained('users');
            $table->string('tokenable_type');
            $table->string('name');
            $table->string('token')->unique();
            $table->text('abilities');
            $table->timestamp('last_used_at');
            $table->timestamp('expired_at');
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_token');
    }
};
