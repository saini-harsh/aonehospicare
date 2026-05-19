<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('inquiries')) {
            Schema::create('inquiries', function (Blueprint $table) {
                $table->id();
                $table->string('form_type')->default('general');
                $table->string('name')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->text('subject')->nullable();
                $table->text('message')->nullable();
                $table->json('additional_data')->nullable();
                $table->string('status')->default('new');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
