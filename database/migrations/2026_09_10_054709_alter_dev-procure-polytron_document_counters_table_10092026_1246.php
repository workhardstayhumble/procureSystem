<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDevProcurePolytronDocumentCountersTable100920261246 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_counters', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('document_type', 25)
                ->default('');

            $table->unsignedSmallInteger('year')
                ->default(0);

            $table->unsignedBigInteger('last_number')
                ->default(0);

            /*
             * Unique
             */
            $table->unique(
                [
                    'document_type',
                    'year',
                ],
                'document_counters_1_unique'
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
        Schema::dropIfExists('document_counters');
    }
}
