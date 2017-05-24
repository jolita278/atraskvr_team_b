<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDefaultEnumValueInVrOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vr_orders', function (Blueprint $table) {
            $table->enum('order_status', array('reserved', 'canceled', 'sold'))->default('reserved')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vr_orders', function (Blueprint $table) {
            $table->enum('order_status', array('reserved', 'canceled', 'sold'))->default('NULL');
        });

    }
}