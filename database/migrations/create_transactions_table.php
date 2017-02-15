<?php

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
    public function __construct()
    {
        $this->table_prefix = config('rewardable.database.table_prefix');
    }

    public function up()
    {
        Schema::create($this->table_prefix . 'transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->morphs('transaction');
            $table->integer('amount');
            $table->json('meta')->nullable();

            $table->integer('credit_type_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop($this->table_prefix . 'transactions');
    }
}
