<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('status');
            $table->dateTime('startevent');
            $table->dateTime('endevent');
            $table->string('alamat', 30);
            $table->string('photo')->nullable();
            $table->string('keterangan');
            $table->integer('paket_id')->unsigned();
            $table->foreign('paket_id')->references('id')->on('pakets')->onDelete('cascade');
            $table->integer('kostum_id')->unsigned();
            $table->foreign('kostum_id')->references('id')->on('kostums')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('gedung_id')->unsigned();
            $table->foreign('gedung_id')->references('id')->on('gedungs')->onDelete('cascade');
            $table->boolean('is_deleted')->default('0');
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
        Schema::dropIfExists('eventss');
    }
}
