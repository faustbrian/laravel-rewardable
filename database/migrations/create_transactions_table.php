<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration
{
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

    public function down()
    {
        Schema::drop('transactions');
    }
}
