<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsSmtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_smtps', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('sender_name')->nullable();
            $table->integer('port')->nullable();
            $table->string('host')->nullable();
            $table->string('delivery_email')->nullable();
            $table->string('admin_email')->nullable();
            $table->string('encryption')->nullable();
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
        Schema::dropIfExists('sms_smtps');
    }
}
