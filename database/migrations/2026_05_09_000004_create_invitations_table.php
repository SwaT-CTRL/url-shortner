<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('role');
            // Polymorphic inviter (Superadmin or Admin)
            $table->string('inviter_type');
            $table->unsignedBigInteger('inviter_id');
            $table->timestamps();

            $table->index(['inviter_type', 'inviter_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
