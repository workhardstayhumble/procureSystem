<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDevProcurePolytronDepartmentsTable090920261143 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('code', 25)
                ->default('');

            $table->string('name', 75)
                ->default('');

            $table->unsignedBigInteger('manager_user_id')
                ->nullable()
                ->default(null);

            $table->boolean('is_active')
                ->default(true);

            $table->unique(
                'code',
                'departments_1_unique'
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
        Schema::dropIfExists('departments');
    }
}
