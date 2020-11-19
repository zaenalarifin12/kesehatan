@extends('layouts.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Buat Surat rekomendasi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Forms</a></div>
              <div class="breadcrumb-item">Advanced Forms</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Surat rekomendasi</h4>
                  </div>
                  <div class="card-body">
                    @foreach ($rekomendasi as $item)
                    <form action="{{url("/rekomendasi/$item->id")}}" method="post">
                    <div class="form-group">
                        <label>id pendaftaran</label>
                        <select class="form-control" required name="daftar_id" disabled>
                            <option value="{{$item->daftar_id}}">{{ $item->daftar_id }}</option>    
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nomor rekomendasi</label>
                        <input name="no_rekomendasi" type="text" disabled disabled class="form-control" value="{{$item->no_rekomendasi}}" required>
                    </div>

                    <div class="form-group">
                        <label>nama</label>
                        <input name="nama" type="text" disabled class="form-control" required value="{{$item->nama}}">
                    </div>

                    <div class="form-group">
                        <label>jabatan</label>
                        <input name="jabatan" type="text" disabled class="form-control" required value="{{$item->jabatan}}">
                    </div>

                    <div class="form-group">
                      <label>Tempat Tanggal Lahir</label>
                      <input name="ttl" type="text" disabled class="form-control" required value="{{$item->ttl}}">
                    </div>

                    <div class="form-group">
                        <label>alamat praktik</label>
                        <input name="alamat_praktik" type="text" disabled  class="form-control" required value="{{$item->alamat_praktik}}">
                    </div>
                   
                      {{-- <div class="row">
                          <div class="col">
                            <input type="reset" class="btn btn-danger" value="reset">
                          </div>
                          <div class="col">
                            <input type="submit" class="btn btn-info" value="text" disabled readonly">
                            @method("PUT")
                        </div>
                      </div> --}}
                      @csrf
                    </form> 
                    @endforeach
                  </div>
                
                </div>
              </div>

            </div>


            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h4>Data Pendaftaran </h4>
                    </div>
                    <div class="card-body">
                      @foreach ($daftar as $item)
                      <div class="form-group">
                          <label>Jenis pendaftaran</label>
                          <select class="form-control" name="jenis" disabled>
                              @if ($item->jenis == "baru")
                                  <option selected value="baru">Pendaftaran baru</option>  
                              @else
                                  <option selected value="lama">Pendaftaran lama</option>  
                              @endif
                          </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" type="text" class="form-control" disabled value="{{ $item->nama }}" required>
                          </div>
                          <div class="form-group">
                            <label>jenis kelamin</label>
                            <select class="form-control" name="jekel" disabled>
                              @if ($item->jekel == "laki-laki")
                                  <option selected value="laki-laki">laki-laki</option>
                              @else
                                  <option selected value="perempuan">perempuan</option>
                              @endif
                              
                            </select>
                          </div>
                          <div class="form-group">
                            <label>tanggal lahir</label>
                            <input name="tanggal_lahir" type="date" disabled value="{{ $item->tanggal_lahir }}" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>tempat lahir</label>
                            <input name="tempat_lahir" type="text" disabled value="{{ $item->tempat_lahir }}" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Agama</label>
                            <input name="agama" type="text" disabled value="{{ $item->agama }}" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="">Alamat Rumah</label>
                          <textarea name="alamat_rumah" class="form-control" id="" cols="30" rows="10" disabled required>{{ $item->alamat_rumah }} </textarea>
                        </div>
                          <div class="form-group">
                            <label>Nomor HP</label>
                            <input name="nomor_hp" type="text" disabled value="{{ $item->nomor_hp }}" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="">Alamat praktik</label>
                            <textarea name="alamat_praktik" class="form-control" id="" cols="30" rows="10" required disabled>{{ $item->alamat_praktik }}</textarea>
                          </div>
                          <div class="form-group">
                            <label>Nama tempat praktik</label>
                            <input name="nama_tempat_praktik" type="text" class="form-control" required disabled value="{{ $item->nama_tempat_praktik }}">
                          </div>
                          <div class="form-group">
                            <label for="">Alamat Kantor</label>
                          <textarea name="alamat_kantor" class="form-control" required id="" cols="30" rows="10" disabled>{{ $item->alamat_kantor }}</textarea>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input name="email" type="email" class="form-control" required disabled value="{{ $item->email }}"">
                        </div>
                        <div class="form-group">
                            <label>Pendidikan terakhir</label>
                            <input name="pendidikan_terakhir" type="text" class="form-control" required disabled value="{{ $item->pendidikan_terakhir }}">
                        </div>
                        <div class="form-group">
                            <label>Universitas</label>
                            <input name="universitas" type="text" disabled value="{{ $item->universitas }}" class="form-control" required>
                        </div>
                        
                        @if (!empty($item->no_surat_rekomendasi_lama))
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
                        @endif
                            
                        <div class="row">
                          {{-- <div class="col">
                              <a href="{{ url("/pendaftaran/$item->id/edit") }}" class="btn btn-outline-info">Edit</a>
                          </div> --}}
                          
                          @if (empty($berkas) )
                              <p>Berkas Belum Di isi</p>
                          @else
                            @foreach ($berkas as $item)
                                <div class="col">
                                    <a href="{{ url("/pemberkasan/$item->id") }}" class="btn btn-outline-info">Berkas</a>
                                </div>
                            @endforeach      
                          @endif
                          
                        </div>    
                      @endforeach
                       
                    </div>
                    
                  </div>
                </div>
  
              </div>

          </div>
        </section>
      </div>
@endsection