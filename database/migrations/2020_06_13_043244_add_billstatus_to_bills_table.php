<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBillstatusToBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->unsignedInteger('bill_stt_id')->default(1);
            $table->foreign('bill_stt_id')->references('id')->on('bill_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
             $table->dropForeign('bill_stt_id');
            $table->dropcolumn('bill_stt_id');
        });
    }
}
