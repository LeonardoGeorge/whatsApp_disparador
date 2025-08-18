<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void"
     */
    public function up()
    {
        Schema::create('send_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained();
            $table->foreignId('contact_id')->constrained();
            $table->string('message_id')->unique();
            $table->enum('status', ['pending', 'sent', 'delivered', 'failed']);
            $table->text('error')->nullable();
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
        Schema::dropIfExists('send_logs');
    }
};
