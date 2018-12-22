<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('campaign_id')->unsigned();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');

            $table->string('donatur_name', 150);
            $table->bigInteger('amount');
            $table->string('contact_number', 50);
            $table->char('is_verified', 1)->default('0');
            $table->char('is_anonym', 1)->default('0');
            $table->string('donatur_email', 150);
            $table->dateTime('donation_date');
            $table->string('transaction_type', 100);
            $table->text('transaction_description');

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
        Schema::dropIfExists('donations');
    }
}
