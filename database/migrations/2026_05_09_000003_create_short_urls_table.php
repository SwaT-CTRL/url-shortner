<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('short_urls', function (Blueprint $table) {
            $table->id();
            $table->text('long_url');
            $table->string('short_code', 10)->unique();
            $table->unsignedBigInteger('hits')->default(1);
            // Polymorphic: generator can be Admin or Member
            $table->string('generator_type');
            $table->unsignedBigInteger('generator_id');
            // Which admin panel this URL belongs to
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->timestamps();

            $table->index(['generator_type', 'generator_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('short_urls');
    }
};
