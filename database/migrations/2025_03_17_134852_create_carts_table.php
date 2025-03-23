<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Only create the table if it doesn't exist
        if (!Schema::hasTable('carts')) {
            Schema::create('carts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('product_id'); // Don't add constraint yet
                $table->integer('quantity')->default(1);
                $table->decimal('total', 10, 2);
                $table->timestamps();
            });
        }

        // Check if there's any foreign key on product_id
        $foreignKeyExists = DB::select("
            SELECT * 
            FROM information_schema.TABLE_CONSTRAINTS 
            WHERE CONSTRAINT_TYPE = 'FOREIGN KEY' 
            AND TABLE_NAME = 'carts' 
            AND CONSTRAINT_NAME LIKE '%product_id%'
        ");

        // If no foreign key exists, add one
        if (empty($foreignKeyExists)) {
            Schema::table('carts', function (Blueprint $table) {
                // Add the foreign key to reference games table
                $table->foreign('product_id')
                    ->references('id')
                    ->on('games')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};