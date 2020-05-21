@extends('layout')
@section('title', 'Login')

@section('content')
    <section class="py-px-40">
        <div class="row justify-content-center">
            <div class="col col-sm-12 col-md-4">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="bg-primary text-white py-1 px-4">
                            <h3>Login Siswa</h3>
                        </div>
                        <form method="post" action="/login/siswa/auth">
                            @csrf
                            <div class="p-4">
                                @include('shared.login-bar')
                                @include('shared.errors')
                                <div class="form-group">
                                    <p>NIS</p>
                                    <input type="text" name="nis" class="form-control" placeholder="NIS">
                                </div>
                                <div class="form-group">
                                    <p>Password</p>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
