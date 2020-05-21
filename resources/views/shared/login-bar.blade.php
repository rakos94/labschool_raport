<ul class="nav nav-pills mb-3">
  <li class="nav-item">
    <a class="nav-link{{ (request()->is('*siswa')) ? ' active' : '' }}" href="/login/siswa">Siswa</a>
  </li>
  <li class="nav-item">
    <a class="nav-link{{ (request()->is('*admin')) ? ' active' : '' }}" href="/login/admin">Admin</a>
  </li>
</ul>
<hr>