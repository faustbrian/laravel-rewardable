<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRanksTable extends Migration
{
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('symbol')->nullable();
            $table->integer('reward')->default(0);

            $table->integer('requirement');
            $table->integer('requirement_type_id');

            $table->timestamps();
        });

        Schema::create('ranks_awarded', function (Blueprint $table) {
            $table->integer('rank_id');

            $table->morphs('rankable');
            $table->timestamp('awarded_at');

            $table->text('revoke_reason')->nullable();
            $table->timestamp('revoked_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('ranks');
        Schema::drop('ranks_awarded');
    }
}
