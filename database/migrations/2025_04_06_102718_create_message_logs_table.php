<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('message_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->constrained();
            $table->text('content');
            $table->string('status')->default('pending'); // pending, sent, failed
            $table->string('channel')->default('USSD'); // USSD, SMS, Email
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('message_logs');
    }
};
