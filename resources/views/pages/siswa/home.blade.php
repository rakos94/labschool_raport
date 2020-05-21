@extends('layout')
@section('title', 'Home')

@section('content')

    @include('shared.navbar')
    <section class="container mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">NIS</div>
                            <div class="col">{{ $siswa->nis }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">Nama</div>
                            <div class="col">{{ $siswa->name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">Raport</div>
                            <div class="col">
                                @if($siswa->raports->count() > 0)
                                <form method="get" action="/download">
                                    <input type="hidden" name="file_location" value="{{ $siswa->raports->last()->file_location }}">
                                    <button class="btn btn-primary">{{ $siswa->raports->last()->file_name }}</button>
                                </form>
                                @else
                                -
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
