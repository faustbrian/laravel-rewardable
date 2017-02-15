<?php
/**
 * Created by PhpStorm.
 * User: mischaking
 * Date: 14/2/17
 * Time: 9:28 AM
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration
{
    public function __construct()
    {
        $this->table_prefix = config('rewardable.database.table_prefix');
    }

    public function up()
    {
        Schema::create($this->table_prefix . 'offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('amount');
            $table->text('description')->nullable();
            $table->json('meta')->nullable();

            $table->morphs('offerable');
            $table->dateTime('valid_from');
            $table->dateTime('valid_to');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop($this->table_prefix . 'offers');
    }
}
