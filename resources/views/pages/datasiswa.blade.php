@extends('layout')
@section('title', 'Home')

@section('content')

    @include('shared.navbar')
    <section class="container mt-5">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="mb-3">
            <a class="btn btn-light" href="/tambah-siswa">Tambah Data Siswa</a>
            <a class="btn btn-light" href="/hapus-siswa">Hapus Data Siswa</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                <th scope="col" width="40">#</th>
                <th scope="col" width="100">NIS</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Raport Terakhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswas as $siswa)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $siswa->nis }}</td>
                    <td>
                        {{ $siswa->name }}
                    </td>
                    <td>
                        @if($siswa->raports->count() > 0)
                        <div class="mr-2 mb-2">
                            <form method="get" action="/download">
                                <input type="hidden" name="file_location" value="{{ $siswa->raports->last()->file_location }}">
                                <button class="btn btn-primary">{{ $siswa->raports->last()->file_name }}</button>
                            </form>
                        </div>
                        @endif
                        <a class="btn btn-light btn-sm" href="/siswa/{{ $siswa->id }}">+ Tambah</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </section>
@endsection
