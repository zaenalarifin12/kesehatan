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
                    <form action="{{url("/rekomendasi")}}" method="post">
                    
                    <div class="form-group">
                        <label>Nomor rekomendasi</label>
                        <input type="text" disabled class="form-control" value="{{ App\SuratRekomendasi::max("id") }}">
                        <input  name="no_rekomendasi" type="hidden" class="form-control" required value="{{ App\SuratRekomendasi::max("id") }}">
                    </div>

                    <div class="form-group">
                    <label>id pendaftaran</label>
                        <select class="form-control" id="id_pendaftaran" required name="daftar_id">
                            @foreach ($daftar as $item)
                            <option value="{{$item->id}}">{{ $item->id }}</option>    
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>nama</label>
                        <input type="text" class="nama form-control" required>
                        <input name="nama" type="hidden" class="nama form-control" required>
                    </div>

                    <div class="form-group">
                        <label>jabatan</label>
                        <input type="text" class="jabatan form-control" required>
                        <input name="jabatan" type="hidden" class=" jabatan form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Tempat Tanggal Lahir</label>
                      <input type="text" class="ttl form-control" required>
                      <input name="ttl" type="hidden" class="ttl form-control" required>
                  </div>

                    <div class="form-group">
                        <label>alamat praktik</label>
                        <input type="text" class="alamat_praktik form-control" required>
                        <input name="alamat_praktik" type="hidden" class="alamat_praktik form-control" required>
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

@section('script')
    <script>
      $('#id_pendaftaran').change(function () {
        var id = $('#id_pendaftaran :selected').text();
          
          $.ajax({
              type: 'GET',
              url: "{{ url('api/rekomendasi') }}" + "/" + id,
              success: function (data) {
                data.forEach(element => {
                  console.log(element)
                  $(".nama").val(element.nama);
                  // $(".jabatan").val(data.nama);
                  $(".nama").val(element.nama);
                  $(".ttl").val(element.tempat_lahir + " " + element.tanggal_lahir);
                  
                  $(".alamat_praktik").val(element.alamat_praktik);
                });
              }
          });
      });
    </script>
@endsection