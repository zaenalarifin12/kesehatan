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
                        <input name="no_rekomendasi" type="text" class="form-control" value="{{$item->no_rekomendasi}}" required>
                    </div>

                    <div class="form-group">
                        <label>nama</label>
                        <input name="nama" type="text" class="form-control" required value="{{$item->nama}}">
                    </div>

                    <div class="form-group">
                        <label>jabatan</label>
                        <input name="jabatan" type="text" class="form-control" required value="{{$item->jabatan}}">
                    </div>

                    <div class="form-group">
                      <label>Tempat Tanggal Lahir</label>
                      <input name="ttl" type="text" class="form-control" required value="{{$item->ttl}}">
                  </div>

                    <div class="form-group">
                        <label>alamat praktik</label>
                        <input name="alamat_praktik" type="text" class="form-control" required value="{{$item->alamat_praktik}}">
                    </div>
                   
                      <div class="row">
                          <div class="col">
                            <input type="reset" class="btn btn-danger" value="reset">
                          </div>
                          <div class="col">
                            <input type="submit" class="btn btn-info" value="Edit">
                            @method("PUT")
                        </div>
                      </div>
                      @csrf
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