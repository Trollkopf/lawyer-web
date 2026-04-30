<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_city')->nullable();
            $table->string('site_tagline')->nullable();
            $table->string('primary_phone')->nullable();
            $table->string('primary_email')->nullable();
            $table->text('office_address')->nullable();
            $table->string('office_hours')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('hero_image_path')->nullable();
            $table->json('hero')->nullable();
            $table->json('presentation')->nullable();
            $table->json('services')->nullable();
            $table->json('team')->nullable();
            $table->json('cases')->nullable();
            $table->json('testimonials')->nullable();
            $table->json('contact')->nullable();
            $table->json('footer')->nullable();
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('summary');
            $table->string('target_client')->nullable();
            $table->string('key_result')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('lawyers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->text('intro');
            $table->text('approach');
            $table->text('target_client')->nullable();
            $table->text('portfolio')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('image_path')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('success_cases', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('challenge');
            $table->text('approach');
            $table->text('outcome');
            $table->string('practice_area')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('matter')->nullable();
            $table->text('quote');
            $table->unsignedTinyInteger('rating')->default(5);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('message');
            $table->timestamp('accepted_privacy_at');
            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('success_cases');
        Schema::dropIfExists('lawyers');
        Schema::dropIfExists('services');
        Schema::dropIfExists('site_settings');
    }
};
