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
            $table->date('validation_start_date')->nullable();
            $table->date('validation_end_date')->nullable();
            $table->integer('people_count')->default(1);
            $table->enum('payment_type', ['credit_card', 'on_delivery']);
            $table->text('note')->nullable();
            $table->string('coupon_amount')->nullable();
            $table->string('coupon_type')->nullable();
            $table->string('stopped_count')->nullable();
            $table->timestamp('stopped_at')->nullable();
            $table->enum('status', ['delivered', 'processing', 'accepted', 'cancelled'])->default('processing');
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
