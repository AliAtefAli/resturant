<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_user', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->enum('shipping_type', ['local', 'delivery']);
            $table->double('billing_total', 10, 2);
            $table->string('billing_phone')->nullable();
            $table->text('billing_address');
            $table->enum('payment_status', ['failed', 'done'])->default('done');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->integer('people_count')->default(1);
            $table->enum('payment_type', ['credit_card', 'on_delivery']);
            $table->text('note')->nullable();
            $table->timestamp('stopped_at')->nullable();
            $table->foreignId('subscription_id')->constrained('subscriptions')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('subscription_user');
    }
}
