<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cisco_id');
            $table->integer('vlan')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();
        });
        Schema::table('vlans', function (Blueprint $table) {
            $table->foreign('cisco_id')->references('id')->on('ciscos')->onDelete('cascade');;
        });
    }


        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vlans');
    }
}
