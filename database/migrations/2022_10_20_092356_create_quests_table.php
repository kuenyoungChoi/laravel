<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->id();

            $table->string('title')->comment('이름');

            $table->unsignedBigInteger('player_id')->nullable()->comment('');



            $table->foreign('player_id')->references('id')->on('players')->onUpdate('cascade')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quests', function (Blueprint $table){
            $table->dropForeign('quests_player_id_foreign');
        });
        Schema::dropIfExists('quests');
    }
};
