<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations: Rename the table from 'shopping_carts' to 'carts'.
     */
    public function up(): void
    {
        if (Schema::hasTable('shopping_carts')) { // Check if the old table exists
            Schema::rename('shopping_carts', 'carts');
        }
    }

    /**
     * Reverse the migration: Rename the table back from 'carts' to 'shopping_carts'.
     */
    public function down(): void
    {
        if (Schema::hasTable('carts')) { // Check if the table exists
            Schema::rename('carts', 'shopping_carts');
        }
    }
};
