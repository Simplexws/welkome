<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('min_price', 10, 2);
            $table->decimal('tax', 8, 4)->default(0.0);
            $table->boolean('is_suite')->default(false);
            $table->mediumInteger('capacity');
            $table->mediumInteger('floor');

            /**
             * 0: Occupied
             * 1: Available
             * 2: Cleaning
             * 3: Disabled
             * 4: Maintenance
             */
            $table->enum('status', [0, 1, 2, 3, 4])->default(1);

            $table->bigInteger('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
