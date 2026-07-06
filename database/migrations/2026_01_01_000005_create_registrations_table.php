<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('organization')->nullable();
            $table->string('job_title')->nullable();
            $table->string('country')->nullable();
            $table->enum('delegate_type', ['delegate', 'exhibitor', 'speaker', 'media', 'vip'])->default('delegate');
            $table->enum('ticket_type', ['standard', 'vip', 'exhibitor_package', 'media'])->default('standard');
            $table->unsignedInteger('amount')->default(0); // in RWF
            $table->enum('payment_method', ['momo', 'card', 'bank_transfer'])->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('payment_reference')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
