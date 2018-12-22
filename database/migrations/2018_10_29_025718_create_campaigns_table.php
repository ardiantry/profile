<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('campaign_category_id')->unsigned();
            $table->foreign('campaign_category_id')->references('id')->on('campaign_categories')->onDelete('cascade');

            $table->integer('campaigner_id')->unsigned();
            $table->foreign('campaigner_id')->references('id')->on('campaigners')->onDelete('cascade');

            $table->integer('campaign_type_id')->unsigned();
            $table->foreign('campaign_type_id')->references('id')->on('campaign_types')->onDelete('cascade');

            $table->string('title', 100);
            $table->string('short_description', 100);
            $table->text('long_description');
            $table->bigInteger('amount_collected')->default("0");
            $table->char('is_verified', 1)->default("0");
            $table->bigInteger('target_amount');
            $table->dateTime('deadline_date');
            $table->string('location', 150);
            $table->string('main_picture', 150)->nullable();
            $table->string('main_video', 150)->nullable();
            $table->char('is_cair', 1)->default('0');
            $table->string('rekening_pencairan', 100)->nullable();
            $table->string('pencairan_code', 6)->nullable();

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
        Schema::dropIfExists('campaigns');
    }
}
