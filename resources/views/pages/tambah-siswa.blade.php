@extends('layout')
@section('title', 'Home')

@section('content')

    @include('shared.navbar')
    <section class="container mt-5">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/admin/tambah-siswa/post" enctype="multipart/form-data">
                            @csrf
                            @include('shared.errors')
                            <div class="row mb-3">
                                <div class="col">NIS</div>
                                <div class="col"><input type="text" name="nis" class="form-control" placeholder="NIS"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">Nama</div>
                                <div class="col"><input type="text" name="name" class="form-control" placeholder="Nama"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">Password</div>
                                <div class="col"><input type="text" name="password" class="form-control" placeholder="Password"></div>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
