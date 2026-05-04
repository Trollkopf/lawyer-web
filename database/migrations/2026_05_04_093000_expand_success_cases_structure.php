<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('success_cases', function (Blueprint $table) {
            $table->text('diagnosis')->nullable()->after('challenge');
            $table->text('takeaway')->nullable()->after('outcome');
        });
    }

    public function down(): void
    {
        Schema::table('success_cases', function (Blueprint $table) {
            $table->dropColumn(['diagnosis', 'takeaway']);
        });
    }
};
