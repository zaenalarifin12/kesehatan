<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratRekomendasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_rekomendasi', function (Blueprint $table) {
            $table->id();
            $table->string("no_rekomendasi");
            $table->string("nama");
            $table->string("jabatan");
            $table->string("ttl");
            $table->text("alamat_praktik");
            $table->integer("status")->default(0);

            $table->unsignedBigInteger("daftar_id");
            $table->foreign("daftar_id")->references("id")->on("daftar_praktik")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_rekomendasi');
    }
}
