<section>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Labschool</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
                    <a class="nav-link" href="/home">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ (request()->is('data-siswa')) ? 'active' : '' }}">
                    <a class="nav-link" href="/data-siswa">Data Siswa</a>
                </li>
            </ul>
            <div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </div>                    
            </div>
        </div>
    </nav>
</section>