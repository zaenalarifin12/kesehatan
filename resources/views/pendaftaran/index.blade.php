@extends('layouts.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pendaftaran</h1>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Pendaftaran tempat praktik</h4>
                    @if (Auth::user()->level == "pendaftar")
                      <a href="{{ url("/pendaftaran/create?type=$type") }}" class="btn btn-info">Daftar baru</a>    
                    @endif
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              Nomor
                            </th>
                            <th>Id Pendaftaran</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($daftar as $item)
                            <tr>
                              <td> {{ $loop->iteration }} </td>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->nama }}</td>
                              <td>{{ $item->jenis }}</td>
                              <td>
                                <a href="{{ url("/pendaftaran/". $item->id . "?type=" . $item->jenis) }}" class="btn btn-primary btn-sm">Lihat</a>
                                <form action="{{ url("/pendaftaran/$item->id" . "?type=" . $item->jenis) }}" method="post" style="display:inline">
                                  <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                  @csrf
                                  @method("DELETE")
                                </form>
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