<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTransactionsTable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class CreateTransactionsTable extends Migration
{
    /**
     *
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->morphs('transactionable');
            $table->integer('amount');
            $table->json('meta')->nullable();

            $table->integer('credit_type_id');

            $table->timestamps();
        });
    }

    /**
     *
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
