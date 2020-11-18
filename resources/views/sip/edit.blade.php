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
                    @foreach ($sip as $item)
                          
                    <form action="{{url("/sip/$item->id")}}" method="post">

                    <div class="form-group">
                    <label>ID surat rekomendasi</label>
                        <select class="form-control" required name="rekomendasi_id" disabled>
                            <option value="{{$item->id}}">{{ $item->rekomendasi_id }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label>Nomor SIP</label>
                      <input name="nomor_sip" value="{{ $item->nomor_sip }}" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>nama</label>
                        <input name="nama" value="{{ $item->nama }}" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>alamat rumah</label>
                        <input name="alamat_rumah" value="{{ $item->alamat_rumah }}" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Tempat tanggal lahir</label>
                      <input name="ttl" value="{{ $item->ttl }}" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>nama tempat praktik</label>
                      <input name="nama_tempat_praktik" value="{{ $item->nama_tempat_praktik }}" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>alamat tempat praktik</label>
                      <input name="alamat_praktik" value="{{ $item->alamat_praktik}}" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>masa berlaku  dari</label>
                      <input name="masa_berlaku_dari" value="{{ $item->masa_berlaku_dari }}" type="date" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>masa berlaku sampai</label>
                      <input name="masa_berlaku_sampai" value="{{ $item->masa_berlaku_sampai}}" type="date" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>untuk praktik</label>
                      <input name="untuk_praktik" value="{{ $item->untuk_praktik }}" type="text" class="form-control" required>
                    </div>
                   
                      <div class="row">
                          <div class="col">
                            <input type="reset" class="btn btn-danger" value="reset">
                          </div>
                          <div class="col">
                            <input type="submit" class="btn btn-info" value="Edit">
                            @csrf
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