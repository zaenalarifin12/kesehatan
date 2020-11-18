<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sip', function (Blueprint $table) {
            $table->id();
            $table->string("nomor_sip");
            $table->string("nama");
            $table->string("ttl");
            $table->string("alamat_rumah");
            $table->string("nama_tempat_praktik");
            $table->string("alamat_praktik");
            $table->date("masa_berlaku_dari");
            $table->date("masa_berlaku_sampai");
            $table->string("untuk_praktik");
            $table->string("status")->default(0);

            $table->unsignedBigInteger("rekomendasi_id");
            $table->foreign("rekomendasi_id")->references("id")->on("surat_rekomendasi")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sip');
    }
}
