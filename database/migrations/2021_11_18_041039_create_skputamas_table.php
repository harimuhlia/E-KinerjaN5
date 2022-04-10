<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkputamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skputamas', function (Blueprint $table) {
            $table->id();
            $table->string('kegiatan')->nullable();
            $table->string('tupoksi')->nullable();
            $table->string('jml_output');
            $table->string('file_output');
            $table->string('jml_waktu');
            $table->string('jenis_waktu');
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
        Schema::dropIfExists('skputamas');
    }
}
