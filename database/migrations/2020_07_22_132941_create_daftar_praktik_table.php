<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarPraktikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_praktik', function (Blueprint $table) {
            $table->id();
            $table->enum("jenis", ["baru", "lama"])->nullable();
            $table->string("nama")->nullable();
            $table->enum("jekel", ["laki-laki", "perempuan"])->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->string("tempat_lahir")->nullable();
            $table->string("agama")->nullable();
            $table->text("alamat_rumah")->nullable();
            $table->string("nomor_hp")->nullable();
            $table->text("alamat_praktik")->nullable();
            $table->text("nama_tempat_praktik")->nullable();
            $table->text("alamat_kantor")->nullable();
            $table->string("email")->nullable();
            $table->string("pendidikan_terakhir")->nullable();
            $table->string("universitas")->nullable();
            // for praktik lama
            $table->string("no_surat_rekomendasi_lama")->nullable();
            $table->string("no_sip_lama")->nullable();
            $table->string("sip_ke")->nullable();

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_praktik');
    }
}
