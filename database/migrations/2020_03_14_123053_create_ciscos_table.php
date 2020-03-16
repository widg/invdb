<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiscosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciscos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->string('hostname');
            $table->string('type')->nullable();
            $table->integer('dmvpn')->nullable();
            $table->ipAddress('ip_external')->nullable();
            $table->longText('comment')->nullable();
            $table->string('tpm_enable')->nullable();
            $table->string('tpm_radius_hm')->nullable();
            $table->string('tpm_radius_dc')->nullable();
            $table->boolean('status')->default(true);
            $table->longText('note')->nullable();
            $table->timestamps();
        });
        Schema::table('ciscos', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciscos');
    }
}
