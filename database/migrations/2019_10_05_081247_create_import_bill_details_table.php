<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_bill_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('import_bill_id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('total');
            $table->foreign('import_bill_id')->references('id')->on('import_bills');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('import_bill_details');
    }
}
