@extends('layouts.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Daftarkan user</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftarkan User</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ url("/users") }}" method="post">
                    
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="name" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Username</label>
                      <input name="username" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Level</label>
                      <select id="" name="level" class="form-control">
                        <option value="pendaftar">pendaftar</option> 
                        <option value="kasi">kasi</option> 
                        <option value="kabid">kabid</option> 
                        <option value="kepala">kepala</option> 
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input name="password" type="password" class="form-control">
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