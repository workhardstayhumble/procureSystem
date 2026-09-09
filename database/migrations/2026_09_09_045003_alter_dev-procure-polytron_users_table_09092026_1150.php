<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDevProcurePolytronUsersTable090920261150 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('department_id');

            $table->string('name', 75)
                ->default('');

            $table->string('email', 50)
                ->default('');

            $table->string('password', 255)
                ->default('');

            $table->boolean('is_active')
                ->default(true);

            $table->unique(
                'email',
                'users_1_unique'
            );

            $table->foreign('department_id')
                ->references('id')
                ->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
