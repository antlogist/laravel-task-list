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
        Schema::create('task_statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id');
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks')->onUpdate('cascade')->onDelete('cascade');
            $table->primary('task_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_statuses');
    }
};
