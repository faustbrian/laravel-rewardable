<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeaderboardTable extends Migration
{
    public function up()
    {
        Schema::create('leaderboard', function (Blueprint $table) {
            $table->increments('id');

            $table->morphs('boardable');
            $table->integer('position');
            $table->integer('experience')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('leaderboard');
    }
}
