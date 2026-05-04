<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('services')) {
            return;
        }

        DB::statement('ALTER TABLE services MODIFY target_client TEXT NULL');
        DB::statement('ALTER TABLE services MODIFY key_result TEXT NULL');
    }

    public function down(): void
    {
        if (!Schema::hasTable('services')) {
            return;
        }

        DB::statement('ALTER TABLE services MODIFY target_client VARCHAR(255) NULL');
        DB::statement('ALTER TABLE services MODIFY key_result VARCHAR(255) NULL');
    }
};
