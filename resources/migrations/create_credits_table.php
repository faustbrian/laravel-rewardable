<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCreditsTable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class CreateCreditsTable extends Migration
{
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('credit_type_id');

            $table->string('name');
            $table->integer('amount');
            $table->text('description')->nullable();
            $table->json('meta')->nullable();

            $table->morphs('creditable');
            $table->timestamp('awarded_at');
            $table->morphs('reasonable');

            $table->text('revoke_reason')->nullable();
            $table->timestamp('revoked_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('credits');
    }
}
