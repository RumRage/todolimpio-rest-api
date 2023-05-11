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
        Schema::create('schedules', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tel');
            $table->string('address');
            $table->datetime('date_time');
            $table->decimal('price', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->decimal('total_price', 8, 2);
            $table->enum('payments', ['Efectivo', 'Transferencia']);
            $table->enum('status', ['Hecho', 'Pendiente', 'Cancelado'])->default('Pendiente');
            $table->timestamps();
        });

        Schema::create('combo_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('combo_id');
            $table->foreign('combo_id')->references('id')->on('combos')->onDelete("cascade");
            $table->unsignedBigInteger('schedule_id');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
