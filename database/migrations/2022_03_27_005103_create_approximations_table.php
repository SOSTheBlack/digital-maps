<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateApproximationsTable.
 */
return new class extends Migration {
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
            $table->integer('meters');
            $table->time('time');
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
};
