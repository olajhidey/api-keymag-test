<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_activities', function (Blueprint $table) {
            $table->id();
            $table->string("type_of_service");
            $table->string("type_of_key");
            $table->string("name_of_key");
            $table->string("key_owner");
            $table->string("key_owner_phone")->nullable();
            $table->string("key_owner_email")->nullable();
            $table->string("key_owner_address")->nullable();
            $table->string("type_of_car")->nullable();
            $table->string("engine_no")->nullable();
            $table->string("vehicle_no")->nullable();
            $table->string("driver_license")->nullable();
            $table->string("reason");
            $table->string("quantity");
            $table->string("price");
            $table->foreignId("customer_id");
            $table->string("uid");
            $table->softDeletes("deleted_at");
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
        Schema::dropIfExists('customer_activities');
    }
}
