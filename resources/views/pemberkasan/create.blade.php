@extends('layouts.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Buat pendaftaran</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftarkan Praktik Anda</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ url("/pemberkasan") }}" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label>id pendaftaran</label>
                        <select class="form-control" required name="daftar_id">
                            @foreach ($pendaftaran as $item)
                              <option value="{{$item->id}}">{{ $item->id }}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto rapi</label>
                        <input name="rapi" type="file" class="form-control" accept="image/*" required>
                    </div>
                  
                    <div class="form-group">
                        <label>Foto Ijazah</label>
                        <input name="ijazah" type="file" class="form-control" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label>Foto KTP</label>
                        <input name="ktp" type="file" class="form-control" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label>Foto STR dilegalisir KKI</label>
                        <input name="str_dilegalisir_kki" type="file" class="form-control" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label>Foto Surat pelayanan tempat praktik</label>
                        <input name="surat_pernyataan_tempat_praktik" type="file" class="form-control" accept="image/*" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Foto Surat persetujuan dari atasan</label>
                        <input name="surat_persetujuan_dari_atasan" type="file" class="form-control" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label>Foto sertifikat bpjs</label>
                        <input name="sertifikat_bpjs" type="file" class="form-control" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label>Foto SIP <span class="text-primary">Jika sudah mengajukan sip silahkan di isiw<span></label>
                        <input name="sip" type="file" class="form-control" accept="image/*">
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