@extends('layout')
@section('title', 'Home')

@section('content')

    @include('shared.navbar')
    <section class="container mt-5">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form method="get" action="/hapus-siswa/confirm" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">NIS</div>
                                <div class="col"><input type="text" name="nis" class="form-control" placeholder="NIS"></div>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
