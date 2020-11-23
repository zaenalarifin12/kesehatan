@extends('layouts.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Pemberkasan</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Detail Pemberkasan</h4>
                  </div>
                  <div class="card-body">
                    
                    @foreach ($pemberkasan as $item)
                    <div class="form-group">
                      <label>id pendaftaran</label>
                        <select class="form-control" required name="daftar_id" disabled>
                              <option selected value="{{$item->daftar_id}}">{{ $item->daftar_id }}</option>    
                        </select>
                    </div>

                    <label>Foto rapi</label>
                    <div class="form-group">
                        <img src="{{ asset("/storage/berkas/$item->rapi") }}" alt="" srcset="" style="width: 300px; height: 300px">
                    </div>
                  
                    <label>Foto Ijazah</label>
                    <div class="form-group">
                        <img src="{{ asset("/storage/berkas/$item->ijazah") }}" alt="" srcset="" style="width: 300px; height: 300px">
                    </div>

                    <label>Foto KTP</label>
                    <div class="form-group">
                        <img src="{{ asset("/storage/berkas/$item->ktp") }}" alt="" srcset="" style="width: 300px; height: 300px">
                    </div>

                    <label>Foto STR dilegalisir KKI</label>
                    <div class="form-group">
                        <img src="{{ asset("/storage/berkas/$item->str_dilegalisir_kki") }}" alt="" srcset="" style="width: 300px; height: 300px">
                    </div>

                    <label>Foto Surat pelayanan tempat praktik</label>
                    <div class="form-group">
                        <img src="{{ asset("/storage/berkas/$item->surat_pernyataan_tempat_praktik") }}" alt="" srcset="" style="width: 300px; height: 300px">
                    </div>

                    <label>Foto Surat persetujuan dari atasan</label>
                    <div class="form-group">
                        <img src="{{ asset("/storage/berkas/$item->surat_persetujuan_dari_atasan") }}" alt="" srcset="" style="width: 300px; height: 300px">
                    </div>

                    <label>Foto sertifikat bpjs</label>
                    <div class="form-group">    
                        <img src="{{ asset("/storage/berkas/$item->sertifikat_bpjs") }}" alt="" srcset="" style="width: 300px; height: 300px">
                    </div>
                    @if ($item->sip != null)
                    <label>Foto SIP</label>
                    <div class="form-group">
                        <img src="{{ asset("/storage/berkas/$item->sip") }}" alt="" srcset="" style="width: 300px; height: 300px">
                    </div>
                    @endif

                    <div class="form-group">
                      <div class="row d-flex justify-content-around">
                          {{-- <a href="{{ url("/pemberkasan/$item->id/edit") }}" class="btn btn-outline-info">Edit</a> --}}
                      
                        <div class="col">
                            @if ($rekomendasi != null)
                            
                            @foreach ($rekomendasi as $item2)
                            <p>Surat Rekomendasi</p>
                            <div class="row d-flex flex-row">

                              @if ($item2->status == 0 && auth()->user()->level == "kabid")
                                <form action="{{ url("/rekomendasi/$item2->id/accKabid")}}" method="post" style="display:inline">
                                  <button class="btn btn-info btn-sm" type="submit">Acc</button>
                                  @csrf
                                  @method("PUT")
                                </form>

                                <form action="{{ url("/rekomendasi/$item2->id/tidakSetuju")}}" method="post" style="display:inline">
                                  <button class="btn btn-danger btn-sm" type="submit">Tolak</button>
                                  @csrf
                                  @method("PUT")
                                </form>

                                <br>
                              @endif

                              @if ($item2->status == 1 && auth()->user()->level == "kabid")
                                  <p class="text-success">Anda Sudah Menkonfirmasi</p>
                                <br>
                              @endif

                              @if ($item2->status == 1 && auth()->user()->level == "kepala")
                              
                                  <form action="{{ url("/rekomendasi/$item2->id/accKepala")}}" method="post" style="display:inline">
                                    <button class="btn btn-info btn-sm" type="submit">Acc</button>
                                    @csrf
                                    @method("PUT")
                                  </form>

                                  <form action="{{ url("/rekomendasi/$item2->id/tidakSetuju")}}" method="post" style="display:inline">
                                    <button class="btn btn-danger btn-sm" type="submit">Tolak</button>
                                    @csrf
                                    @method("PUT")
                                  </form>
                              
                              @endif

                              
                              @if ($item2->status == 4)
                                  <p class="text-danger">Ditolak</p>
                                <br>
                              @endif

                            </div>

                            @endforeach

                          @else
                              <p>Sip Belum di isi</p>
                          @endif
                        </div>
                        

                        <div class="col">

                        
                          @if ($sip != null)
                          
                            @foreach ($sip as $item2)
                            <p>SIP</p>
                            <div class="row d-flex flex-row">

                              @if ($item2->status == 0 && auth()->user()->level == "kabid")
                                <form action="{{ url("/sip/$item2->id/accKabid")}}" method="post" style="display:inline">
                                  <button class="btn btn-info btn-sm" type="submit">Acc</button>
                                  @csrf
                                  @method("PUT")
                                </form>

                                <form action="{{ url("/sip/$item2->id/tidakSetuju")}}" method="post" style="display:inline">
                                  <button class="btn btn-danger btn-sm" type="submit">Tolak</button>
                                  @csrf
                                  @method("PUT")
                                </form>

                                <br>
                              @endif

                              @if ($item2->status == 1 && auth()->user()->level == "kabid")
                                  <p class="text-success">Anda Sudah Menkonfirmasi</p>
                                <br>
                              @endif

                              @if ($item2->status == 1 && auth()->user()->level == "kepala")
                              
                                  <form action="{{ url("/sip/$item2->id/accKepala")}}" method="post" style="display:inline">
                                    <button class="btn btn-info btn-sm" type="submit">Acc</button>
                                    @csrf
                                    @method("PUT")
                                  </form>

                                  <form action="{{ url("/sip/$item2->id/tidakSetuju")}}" method="post" style="display:inline">
                                    <button class="btn btn-danger btn-sm" type="submit">Tolak</button>
                                    @csrf
                                    @method("PUT")
                                  </form>
                              
                              @endif

                              
                              @if ($item2->status == 4)
                                  <p class="text-danger">Ditolak</p>
                                <br>
                              @endif

                            </div>

                            @endforeach

                          @else
                              <p>Sip Belum di isi</p>
                          @endif

                        </div>

                        @if ($rekomendasi != null)
                          @foreach ($rekomendasi as $item2)
                            <div class="row">
                              @if ($item2->status == 2)
                                <a href="{{ url("/rekomendasi/$item2->id/cetak") }}" class="btn btn-success btn-sm">Cetak Rekomendasi</a>
                              @endif
                            </div>
                          @endforeach
                        @endif

                        @if ($sip != null)
                          @foreach ($sip as $item2)
                            <div class="row">
                              @if ($item2->status == 2)
                                <a href="{{ url("/sip/$item2->id/cetak") }}" class="btn btn-success btn-sm">Cetak SIP</a>
                              @endif
                            </div>
                          @endforeach
                        @endif

                    </div>
                  </div>
                  @endforeach
                </div>
              </div>

            </div>
          </div>
        </section>
      </div>
@endsection