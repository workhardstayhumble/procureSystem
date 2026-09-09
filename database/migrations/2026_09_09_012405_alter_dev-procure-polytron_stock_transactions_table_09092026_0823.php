<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDevProcurePolytronStockTransactionsTable090920260823 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('warehouse_id');

            $table->unsignedBigInteger('item_id');

            $table->enum('trx_type', [
                'IN',
                'OUT',
            ])->default('IN');

            $table->string('reference_type', 50)
                ->default('');

            $table->unsignedBigInteger('reference_id')
                ->default(0);

            $table->decimal('qty_in', 18, 4)
                ->default(0);

            $table->decimal('qty_out', 18, 4)
                ->default(0);

            $table->timestamp('trx_date')
                ->useCurrent();

            /*
             * Indexes
             */
            $table->index(
                'warehouse_id',
                'stock_transactions_1_index'
            );

            $table->index(
                'item_id',
                'stock_transactions_2_index'
            );

            $table->index(
                'trx_date',
                'stock_transactions_3_index'
            );

            $table->index(
                [
                    'reference_type',
                    'reference_id',
                ],
                'stock_transactions_4_index'
            );

            /*
             * Foreign Keys
             */
            $table->foreign('warehouse_id')
                ->references('id')
                ->on('warehouses');

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
        Schema::dropIfExists('stock_transactions');
    }
}
