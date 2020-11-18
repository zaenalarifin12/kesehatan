<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemberkasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemberkasan', function (Blueprint $table) {
            $table->id();
            $table->string("rapi");
            $table->string("ijazah");
            $table->string("ktp");
            $table->string("str_dilegalisir_kki");
            $table->string("surat_pernyataan_tempat_praktik");
            $table->string("surat_persetujuan_dari_atasan");
            $table->string("sertifikat_bpjs");
            $table->string("sip")->nullable();

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
        Schema::dropIfExists('pemberkasan');
    }
}
