<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBadgesTable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class CreateBadgesTable extends Migration
{
    public function up()
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('symbol')->nullable();
            $table->integer('reward')->default(0);

            $table->integer('requirement');
            $table->integer('requirement_type_id');

            $table->timestamps();
        });

        Schema::create('badges_awarded', function (Blueprint $table) {
            $table->integer('badge_id');

            $table->morphs('badgeable');
            $table->timestamp('awarded_at');
			$table->morphs('reasonable');

            $table->text('revoke_reason')->nullable();
            $table->timestamp('revoked_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('badges');
        Schema::drop('badges_awarded');
    }
}
