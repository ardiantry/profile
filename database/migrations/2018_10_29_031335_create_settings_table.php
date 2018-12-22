<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name', 100);
            $table->text('site_description')->nullable();
            $table->string('email', 150)->nullable();
            $table->string('phone', 100)->nullable();
            $table->text('address')->nullable();
            $table->text('home_message')->nullable();
            $table->string('logo_icon',100)->nullable();
            $table->string('logo_text',100)->nullable();
            $table->string('logo_text_black', 100)->nullable();
            $table->string('favicon', 100)->nullable();
            $table->string('login_banner', 100)->nullable();
            $table->string('footer', 100)->nullable();
            $table->string('login_background', 100)->nullable();

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
        Schema::dropIfExists('settings');
    }
}
