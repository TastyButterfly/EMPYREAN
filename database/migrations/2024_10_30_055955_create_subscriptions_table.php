<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // foreign key
            $table->string('plan', 50); // subscription plan
            $table->date('start_date'); // start date of the subscription
            $table->date('end_date')->nullable(); // end date of the subscription, nullable for ongoing subscriptions
            $table->string('status', 50)->default('active'); // possible values: active, expired, cancelled
            $table->timestamps();
            $table->string('duration', 50); // subscription duration
            $table->unsignedBigInteger('payment_id')->nullable(); // foreign key
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
