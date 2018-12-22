<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaigner_type_id')->unsigned()->nullable();
            $table->foreign('campaigner_type_id')->references('id')->on('campaigner_types')->onDelete('cascade');
            $table->string('full_name', 150);
            $table->string('password', 255);
            $table->string('password_md5', 255);
            $table->string('email', 100);
            $table->char('gender', 1)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('ktp_picture', 150)->nullable();
            $table->string('ktp_number', 100)->nullable();
            $table->char('is_verified', 1)->default('0');
            $table->string('profile_pic', 150)->nullable();
            $table->string('short_bio', 150)->nullable();
            $table->text('long_bio')->nullable();
            $table->bigInteger('dompet_amount')->default('0');
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
        Schema::dropIfExists('campaigners');
    }
}
