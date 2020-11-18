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
                    <h4>Edit Pendaftaran anda</h4>
                  </div>
                  <div class="card-body">
                    
                    @foreach ($daftar as $item)
                    <form action="{{url("/pendaftaran/$item->id")}}" method="post">
                    <div class="form-group">
                        <label>Jenis pendaftaran</label>
                        <select class="form-control" name="jenis">
                            @if ($item->jenis == "baru")
                                <option selected value="baru">Pendaftaran baru</option>  
                                <option value="lama">Pendaftaran lama</option>  
                            @else
                                <option value="baru">Pendaftaran baru</option>  
                                <option selected value="lama">Pendaftaran lama</option>  
                            @endif
                        </select>
                      </div>
                      
                      <div class="form-group">
                          <label>Nama</label>
                          <input name="nama" type="text" class="form-control" value="{{ $item->nama }}" required>
                        </div>
                        <div class="form-group">
                          <label>jenis kelamin</label>
                          <select class="form-control" name="jekel">
                            @if ($item->jekel == "laki-laki")
                                <option selected value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                            @else
                                <option value="laki-laki">laki-laki</option>
                                <option selected value="perempuan">perempuan</option>
                            @endif
                            
                          </select>
                        </div>
                        <div class="form-group">
                          <label>tanggal lahir</label>
                          <input name="tanggal_lahir" type="date" value="{{ $item->tanggal_lahir }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>tempat lahir</label>
                          <input name="tempat_lahir" type="text" value="{{ $item->tempat_lahir }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Agama</label>
                          <input name="agama" type="text" value="{{ $item->agama }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="">Alamat Rumah</label>
                        <textarea name="alamat_rumah" class="form-control" id="" cols="30" rows="10" required>{{ $item->alamat_rumah }} </textarea>
                      </div>
                        <div class="form-group">
                          <label>Nomor HP</label>
                          <input name="nomor_hp" type="number" value="{{ $item->nomor_hp }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat praktik</label>
                          <textarea name="alamat_praktik" class="form-control" id="" cols="30" rows="10" required>{{ $item->alamat_praktik }}</textarea>
                        </div>
                        <div class="form-group">
                          <label>Nama tempat praktik</label>
                          <input name="nama_tempat_praktik" type="text" class="form-control" required value="{{ $item->nama_tempat_praktik }}">
                        </div>
                        <div class="form-group">
                          <label for="">Alamat Kantor</label>
                        <textarea name="alamat_kantor" class="form-control" required id="" cols="30" rows="10">{{ $item->alamat_kantor }}</textarea>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" required value="{{ $item->email }}"">
                      </div>
                      <div class="form-group">
                          <label>Pendidikan terakhir</label>
                          <input name="pendidikan_terakhir" type="text" class="form-control" required value="{{ $item->pendidikan_terakhir }}">
                      </div>
                      <div class="form-group">
                          <label>Universitas</label>
                          <input name="universitas" type="text" value="{{ $item->universitas }}" class="form-control" required>
                      </div>
                      
                        <p>Kalau anda pendaftar lama form dibawah wajib diisi</p>
                        <div class="form-group">
                            <label>NO. surat rekomendasi lama</label>
                            <input name="no_surat_rekomendasi_lama" value="{{ $item->no_surat_rekomendasi_lama }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No Sip Lama</label>
                            <input name="no_sip_lama" value="{{ $item->no_sip_lama }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>SIP ke :</label>
                            <input name="sip_ke" value="{{ $item->sip_ke }}" type="text" class="form-control">
                        </div>
                          
                      <div class="row">
                        <div class="col">
                            <button class="btn btn-info" type="submit">Edit</button>
                            @method("PUT")
                            @csrf
                        </div>
                      </div>    
                    </form>
                      @endforeach
                    
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>
      </div>
@endsection