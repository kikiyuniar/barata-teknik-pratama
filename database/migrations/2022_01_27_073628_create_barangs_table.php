<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('sub_kategori_id');
            $table->string('slug');
            $table->string('judul');
            $table->string('foto');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategoris');
            $table->foreign('sub_kategori_id')->references('id')->on('subkategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
