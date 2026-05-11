<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('login_attempts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('ip_address', 45)->nullable();
            $table->integer('attempts')->default(1);
            $table->timestamp('last_attempt_at');
            $table->timestamp('blocked_until')->nullable();
            $table->timestamps();
            
            $table->index(['email', 'ip_address']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('login_attempts');
    }
};