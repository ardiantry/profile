<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemafrontTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temafront', function (Blueprint $table) {
            $table->increments('id_tema');
            $table->char('active', 1)->default('0');
            $table->string('judul',30);
            $table->string('gambar',255);
            $table->string('url_path',255);
            //$table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temafront');
    }
}
