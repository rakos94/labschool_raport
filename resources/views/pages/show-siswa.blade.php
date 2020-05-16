@extends('layout')
@section('title', 'Home')

@section('content')

    @include('shared.navbar')
    <section class="container mt-5">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/upload" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">NIS</div>
                                <div class="col">{{ $siswa->nis }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">Nama</div>
                                <div class="col">{{ $siswa->name }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">File</div>
                                <div class="col">
                                    <input type="file" class="" name="raport">
                                </div>
                            </div>
                            <div>
                                <input type="hidden" name="nis" value="{{ $siswa->nis }}">
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
