@extends('layouts.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Surat Rekomendasi</h1>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Surat rekomendasi</h4>
                    @if (auth()->user()->level == "kasi")
                      <a href="{{ url("/rekomendasi/create") }}" class="btn btn-info">Daftar baru</a>
                    @endif
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              id pendaftaran
                            </th>
                            <th>Nomor rekomendasi</th>
                            <th>Nama</th>
                            <th>Alamat praktik</th>
                            <th>status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($rekomendasi as $item)
                            <tr>
                              <td> {{$item->daftar_id}} </td>
                              <td> {{$item->no_rekomendasi}} </td>
                              <td> {{$item->nama}} </td>
                              <td> {{$item->alamat_praktik}} </td>
                              <td> 
                                @if ($item->status == 0)
                                  belum disetujui
                                @elseif($item->status == 1)
                                  disetujui kabid
                                @elseif($item->status == 2)
                                  disetujui kepala
                                @else
                                  ditolak
                                @endif
                              </td>
                              <td>
                               

                                @if (auth()->user()->level != "pendaftar" || auth()->user()->level != "kepala")
                                  <form action="{{ url("/rekomendasi/$item->id")}}" method="post" style="display:inline">
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    @csrf
                                    @method("DELETE")
                                  </form>
                                  {{-- <a href="{{ url("/rekomendasi/$item->id/edit") }}" class="btn btn-info btn-sm">Edit</a> --}}
                                  <a href="{{ url("/rekomendasi/$item->id") }}" class="btn btn-info btn-sm">Lihat</a>
                                @endif

                                
                                @if ($item->status == 2)
                                  <a href="{{ url("/rekomendasi/$item->id/cetak") }}" class="btn btn-success btn-sm">Cetak Rekomendasi</a>
                                @endif
                              

                                
                              </td>
                            </tr>
                          @endforeach                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection