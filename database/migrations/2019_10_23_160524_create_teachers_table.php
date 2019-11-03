<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('te_name');
            $table->string('te_title')->nullable();
            $table->integer('depart_id');
            $table->integer('te_old')->nullable();
            $table->string('te_image');
            $table->string('te_phone')->nullable();
            $table->string('te_email')->nullable();
            $table->text('te_about')->nullable();
            $table->text('te_exper')->nullable();
            $table->text('te_edu')->nullable();
            $table->integer('te_view')->default('0');
            $table->string('te_facebook')->nullable();
            $table->string('te_twitter')->nullable();
            $table->string('te_ig')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
