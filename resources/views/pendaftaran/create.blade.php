@extends('layouts.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Buat Pendaftaran</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Isi berkas-berkas anda</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{url("/pendaftaran")}}" method="post">

                    <div class="form-group">
                      <label>Jenis pendaftaran</label>
                      <select class="form-control" name="jenis">
                        <option value="baru">Pendaftaran baru</option>
                        <option value="lama">Pendaftaran lama</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>jenis kelamin</label>
                        <select class="form-control" name="jekel">
                          <option value="laki-laki">laki-laki</option>
                          <option value="perempuan">perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>tanggal lahir</label>
                        <input name="tanggal_lahir" type="date" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>tempat lahir</label>
                        <input name="tempat_lahir" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <input name="agama" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="">Alamat Rumah</label>
                      <textarea name="alamat_rumah" class="form-control" id="" cols="30" rows="10" required></textarea>
                    </div>
                      <div class="form-group">
                        <label>Nomor HP</label>
                        <input name="nomor_hp" type="number" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="">Alamat praktik</label>
                        <textarea name="alamat_praktik" class="form-control" id="" cols="30" rows="10" required></textarea>
                      </div>
                      <div class="form-group">
                        <label>Nama tempat praktik</label>
                        <input name="nama_tempat_praktik" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="">Alamat Kantor</label>
                      <textarea name="alamat_kantor" class="form-control" required id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan terakhir</label>
                        <input name="pendidikan_terakhir" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Universitas</label>
                        <input name="universitas" type="text" class="form-control" required>
                    </div>
                    <p>Kalau anda pendaftar lama form dibawah wajib diisi</p>
                      <div class="form-group">
                        <label>NO. surat rekomendasi lama</label>
                        <input name="no_surat_rekomendasi_lama" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>No Sip Lama</label>
                        <input name="no_sip_lama" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>SIP ke :</label>
                        <input name="sip_ke" type="text" class="form-control">
                      </div>
                      <div class="row">
                          <div class="col">
                            <input type="reset" class="btn btn-danger" value="reset">
                          </div>
                          <div class="col">
                            <input type="submit" class="btn btn-info" value="Simpan">
                        </div>
                      </div>
                      @csrf
                    </form> 
                  </div>
                  
                </div>
              </div>

            </div>
          </div>
        </section>
      </div>
@endsection