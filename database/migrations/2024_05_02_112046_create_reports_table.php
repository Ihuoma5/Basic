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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('state_id');
            $table->integer('device_id'); 
            $table->string('report_no');
            $table->date('date_faulty');
            $table->string('fault_report')->nullable();
            $table->string('part_changed');
            $table->date('date_returned');
            $table->date('date_received');
            $table->string('repair_remark')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=Pending, 1=Approved');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
