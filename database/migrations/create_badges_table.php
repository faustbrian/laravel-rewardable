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

class CreateBadgesTable extends Migration
{
    public function __construct()
    {
        $this->table_prefix = config('rewardable.database.table_prefix');
    }

    public function up()
    {

        Schema::create($this->table_prefix . 'badges', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('symbol')->nullable();
            $table->integer('reward')->default(0);

            $table->integer('requirement');
            $table->integer('requirement_type_id');

            $table->timestamps();
        });

        Schema::create($this->table_prefix . 'badges_awarded', function (Blueprint $table) {
            $table->integer('badge_id');

            $table->morphs('badgeable');
            $table->timestamp('awarded_at');

            $table->text('revoke_reason')->nullable();
            $table->timestamp('revoked_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop($this->table_prefix . 'badges');
        Schema::drop($this->table_prefix . 'badges_awarded');
    }
}
