<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDevProcurePolytronWarehousesTable080920261543 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('code', 25)
                ->default('');

            $table->string('name', 75)
                ->default('');

            $table->string('location', 100)
                ->default('');

            $table->boolean('is_active')
                ->default(true);

            $table->unique(
                'code',
                'warehouses_1_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouses');
    }
}
