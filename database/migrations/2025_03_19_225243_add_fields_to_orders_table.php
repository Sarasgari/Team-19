<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Add new columns if they don't exist
            if (!Schema::hasColumn('orders', 'customer_name')) {
                $table->string('customer_name')->nullable()->after('user_id');
            }
            
            if (!Schema::hasColumn('orders', 'email')) {
                $table->string('email')->nullable()->after('customer_name');
            }
            
            if (!Schema::hasColumn('orders', 'address')) {
                $table->text('address')->nullable()->after('email');
            }
            
            // Check if we need to rename total to total_amount
            if (Schema::hasColumn('orders', 'total') && !Schema::hasColumn('orders', 'total_amount')) {
                $table->renameColumn('total', 'total_amount');
            }
            // Or add total_amount if neither exists
            else if (!Schema::hasColumn('orders', 'total') && !Schema::hasColumn('orders', 'total_amount')) {
                $table->decimal('total_amount', 10, 2)->default(0)->after('address');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the columns we added
            $table->dropColumn(['customer_name', 'email', 'address']);
            
            // Revert renamed column if applicable
            if (Schema::hasColumn('orders', 'total_amount') && !Schema::hasColumn('orders', 'total')) {
                $table->renameColumn('total_amount', 'total');
            }
        });
    }
};