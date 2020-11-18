@extends('layouts.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>User</h1>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar User</h4>
                    <a href="{{ url("/users/create") }}" class="btn btn-info">Daftar baru</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              Nomor
                            </th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $item)
                            <tr>
                              <td> {{ $loop->iteration }} </td>
                              <td> {{ $item->name }}</td>
                              <td> {{ $item->username }}</td>
                              <td>
                                {{-- <a href="{{ url("/pemberkasan/$item->id") }}" class="btn btn-primary">Lihat</a> --}}
                                <form action="{{ url("/users/$item->id") }}" method="post" style="display:inline">
                                  <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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