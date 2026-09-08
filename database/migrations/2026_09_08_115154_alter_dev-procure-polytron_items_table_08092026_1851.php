<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDevProcurePolytronItemsTable080920261851 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('unit_id');

            $table->string('sku', 50)
                ->default('');

            $table->string('name', 75)
                ->default('');

            $table->unsignedInteger('min_stock')
                ->default(0);

            $table->boolean('is_active')
                ->default(true);

            $table->unique(
                'sku',
                'items_1_unique'
            );

            $table->foreign('category_id')
                ->references('id')
                ->on('item_categories');

            $table->foreign('unit_id')
                ->references('id')
                ->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}