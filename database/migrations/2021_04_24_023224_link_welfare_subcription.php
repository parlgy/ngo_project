<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LinkWelfareSubcription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LinkWelfareSubcription', function (Blueprint $table) {
            $table->id('PAYID');
            $table->string('RegNo');
            $table->string('sub_month')->nullable();
            $table->string('sub_week')->nullable();
            $table->integer('Amount');
            $table->string('Transaction No','40');
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
        Schema::dropIfExists('LinkWelfareSubcription');
    }
}
