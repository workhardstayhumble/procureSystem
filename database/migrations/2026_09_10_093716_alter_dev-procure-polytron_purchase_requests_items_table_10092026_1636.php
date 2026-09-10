<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDevProcurePolytronPurchaseRequestsItemsTable100920261636 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_request_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('purchase_request_id');

            $table->unsignedBigInteger('item_id');

            $table->decimal('qty', 18, 4)
                ->default(0);

            $table->decimal('estimated_price', 18, 2)
                ->default(0);

            $table->string('notes', 255)
                ->default('');

            /*
             * Index
             */
            $table->index(
                'purchase_request_id',
                'purchase_request_items_1_index'
            );

            $table->index(
                'item_id',
                'purchase_request_items_2_index'
            );

            /*
             * Foreign Keys
             */
            $table->foreign('purchase_request_id')
                ->references('id')
                ->on('purchase_requests');

            $table->foreign('item_id')
                ->references('id')
                ->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_request_items');
    }
}
