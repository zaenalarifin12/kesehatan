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
                    <form action="{{url("/sip")}}" method="post">

                    <div class="form-group">
                    <label>ID surat rekomendasi</label>
                        <select class="form-control" id="id_rekomendasi" required name="rekomendasi_id">
                            @foreach ($rekomendasi as $item)
                                <option value="{{$item->id}}">{{ $item->no_rekomendasi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label>Nomor SIP</label>
                      <input name="nomor_sip" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>nama</label>
                        <input type="text" disabled class="nama form-control" disabled required>
                        <input name="nama" type="hidden" class="nama form-control" required>
                    </div>

                    <div class="form-group">
                        <label>alamat rumah</label>
                        <input type="text" disabled class="alamat_rumah form-control" required>
                        <input name="alamat_rumah" type="hidden" class="alamat_rumah form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Tempat tanggal lahir</label>
                      <input name="ttl" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>nama tempat praktik</label>
                      <input name="nama_tempat_praktik" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>alamat tempat praktik</label>
                      <input type="text" disabled class="alamat_praktik form-control" required>
                      <input name="alamat_praktik" type="hidden" class="alamat_praktik form-control" required>
                    </div>

                    <div class="form-group">
                      <label>masa berlaku  dari</label>
                      <input type="date" disabled class="masa_berlaku_dari form-control" required>
                      <input name="masa_berlaku_dari" type="hidden" class="masa_berlaku_dari form-control" required>
                    </div>

                    <div class="form-group">
                      <label>masa berlaku sampai</label>
                      <input type="date" disabled class="masa_berlaku_sampai form-control" required>
                      <input name="masa_berlaku_sampai" type="hidden" class="masa_berlaku_sampai form-control" required>
                    </div>

                    <div class="form-group">
                      <label>untuk praktik</label>
                      <input type="text" disabled class="untuk_praktik form-control" required>
                      <input name="untuk_praktik" type="hidden" class="untuk_praktik form-control" required>
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
      $('#id_rekomendasi').change(function () {
        var id = $('#id_rekomendasi :selected').val();
          
          $.ajax({
              type: 'GET',
              url: "{{ url('api/sip') }}" + "/" + id,
              success: function (data) {
                // console.log(data)
                data.forEach(element => {
                  console.log(element)
                  $(".nama").val(element.nama);
                  $(".alamat_rumah").val(element.alamat_rumah);
                  $(".alamat_praktik").val(element.alamat_praktik);
                  $(".masa_berlaku_dari").val(element.masa_berlaku_dari);
                  $(".masa_berlaku_sampai").val(element.masa_berlaku_sampai);
                  $(".untuk_praktik").val(element.untuk_praktik);
                });
              }
          });
      });
    </script>
@endsection