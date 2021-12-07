

@extends('template')
@section('title','Form Login')
@section('konten')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3>Form Login</h3>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" placeholder="Masukkan email ..." name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" placeholder="Masukkan password ..." name="password" id="password" class="form-control">
                        </div>
                        <div class="">
                            <button class="btn btn-primary btn-sm float-end" id="btn-login">Masuk</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/assets/pages/login.js?v=3') }}"></script>
@endsection
