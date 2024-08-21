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
        Schema::create('log_activitys', function (Blueprint $table) {
            $table->id();
            $table->integer('work_id');
            $table->string('task_name');
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', ['incomplete', 'doing', 'completed']);
            $table->integer('deleted_by');
            $table->String('action');
            $table->timestamp('deleted_at')->useCurrent();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_activity_tables');
    }
};
