@extends('template')

@section('title','List Order')

@section('konten')

<div class="container mt-3">
    @include('modalorder')
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h3>
                            Table Order
                        </h3>
                        <table class="table table-border table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Custumer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('assets/pages/listorder.js') }}"></script>

@endsection
