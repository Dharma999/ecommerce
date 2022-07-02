<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'order_by');
            $table->string('name');
            $table->integer('method');
            $table->string('email');
            $table->bigInteger('contact');
            $table->string('address_line1');
            $table->string('address_line2');
            $table->string('order_no');
            $table->double('subtotal');
            $table->double('tax');
            $table->double('total');
            $table->longText('content');
            $table->enum('status', ['pending', 'approved', 'dispatch', 'delivered'])->default('pending');
            $table->enum('is_read', ['yes', 'no'])->default('no');
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
};
