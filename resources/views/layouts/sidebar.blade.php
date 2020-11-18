<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{url("/")}}">App</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">App</a>
      </div>
      <ul class="sidebar-menu">
          <li><a class="nav-link" href="{{ url("/pendaftaran") }}"><i class="fas fa-registered"></i> <span>Pendaftaran</span></a></li>
          <li><a class="nav-link" href="{{ url("/pemberkasan") }}"><i class="fas fa-file"></i> <span>Berkas</span></a></li>
          <li><a class="nav-link" href="{{ url("/rekomendasi") }}"><i class="fas fa-envelope"></i> <span>surat rekomendasi</span></a></li>
          <li><a class="nav-link" href="{{ url("/sip") }}"><i class="fas fa-envelope"></i> <span>surat SIP</span></a></li>
          @if (auth()->user()->level != "pendaftar")
            <li><a class="nav-link" href="{{ url("/users") }}"><i class="fas fa-user"></i> <span>User</span></a></li>
          @endif
        </ul>
    </aside>
  </div>