@extends('layout')
@section('title', 'Home')

@section('content')

    @include('shared.navbar')
    <section class="container mt-5">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/admin/hapus-siswa/post" enctype="multipart/form-data">
                            @csrf
                            @include('shared.errors')
                            <input type="hidden" name="nis" value="{{ $siswa->nis }}">
                            <div class="row mb-3">
                                <div class="col">NIS</div>
                                <div class="col">{{ $siswa->nis }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">Nama</div>
                                <div class="col">{{ $siswa->name }}</div>
                            </div>
                            <div class="text-center text-danger">
                                <h3>Anda yakin mau menghapus siswa dengan nama '{{ Str::of($siswa->name)->upper() }}'?</h3>
                                <div class="row justify-content-around">
                                    <div class="col">
                                        <button class="btn btn-primary btn-block" type="submit">Ya</button>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-light btn-block" href="/admin/data-siswa">Tidak</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
