<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('oauth_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('merchant')->nullable();
            $table->text('access_token');
            $table->bigInteger('expires_in');
            $table->text('refresh_token');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('oauth_tokens');
    }
};
