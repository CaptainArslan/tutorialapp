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
        Schema::table('tutorial_steps', function (Blueprint $table) {
            $table->foreign('media_id')
                ->references('id')
                ->on('media')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutorial_steps', function (Blueprint $table) {
            $table->dropForeign(['media_id']);
        });
    }
};
