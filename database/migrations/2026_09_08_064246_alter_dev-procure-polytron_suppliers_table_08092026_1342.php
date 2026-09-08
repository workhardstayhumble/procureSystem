<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDevProcurePolytronSuppliersTable080920261342 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('code', 25)
                ->default('');

            $table->string('name', 75)
                ->default('');

            $table->string('tax_no', 100)
                ->default('');

            $table->string('email', 75)
                ->default('');

            $table->string('phone', 20)
                ->default('');

            $table->string('address', 255)
                ->default('');

            $table->boolean('is_active')
                ->default(true);

            $table->unique(
                'code',
                'suppliers_1_unique'
            );

            $table->unique(
                'tax_no',
                'suppliers_2_unique'
            );

            $table->unique(
                'phone',
                'suppliers_3_unique'
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
        Schema::dropIfExists('suppliers');
    }
}
