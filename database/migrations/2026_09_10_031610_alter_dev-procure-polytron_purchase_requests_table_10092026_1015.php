<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDevProcurePolytronPurchaseRequestsTable100920261015 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('pr_no', 30)
                ->default('');

            $table->unsignedBigInteger('requester_id');

            $table->unsignedBigInteger('department_id');

            $table->timestamp('request_date')
                ->useCurrent();

            $table->timestamp('required_date')
                ->useCurrent();

            $table->enum('status', [
                'draft',
                'submitted',
                'approved',
                'rejected',
            ])->default('draft');

            $table->string('purpose', 150)
                ->default('');

            $table->decimal('total_estimate', 18, 2)
                ->default(0);

            /*
             * Unique
             */
            $table->unique(
                'pr_no',
                'purchase_requests_1_unique'
            );

            /*
             * Index
             */
            $table->index(
                'requester_id',
                'purchase_requests_1_index'
            );

            $table->index(
                'department_id',
                'purchase_requests_2_index'
            );

            $table->index(
                'status',
                'purchase_requests_3_index'
            );

            $table->index(
                'request_date',
                'purchase_requests_4_index'
            );

            /* 
             * Foreign Keys
             */
            $table->foreign('requester_id')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('purchase_requests');
    }
}
