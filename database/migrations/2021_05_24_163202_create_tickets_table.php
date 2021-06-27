<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_type');
            $table->integer('ticket_request_type');
            $table->text('subject')->nullable();
            $table->text('description')->nullable();
            $table->double('quantity')->nullable();
            $table->foreignId('equipment_category_id')->nullable()->constrained('equipment_categories');
            $table->foreignId('status_id')->constrained('ticket_statuses');
            $table->foreignId('user_id')->constrained('users'); // ko je uputio
            $table->foreignId('officer_id')->constrained('users'); // ko je preuzeo
            $table->double('costs')->nullable();
            $table->dateTime('expected_delivery_date')->nullable();
            $table->text('admin_comment')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
