<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreatePointInterestsTable.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('point_interests', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(User::class);
            $table->uuid();
            $table->string('name');
            $table->integer('latitude');
            $table->integer('longitude');
            $table->time('opened')->nullable();
            $table->time('closed')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('point_interests');
    }
};
