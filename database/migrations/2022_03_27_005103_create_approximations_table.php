<?php

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateApproximationsTable.
 */
class CreateApproximationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approximations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(User::class);
            $table->uuid();
            $table->integer('latitude');
            $table->integer('longitude');
            $table->integer('time');
            $table->time('meters');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('approximations');
    }
}
