@extends('template')

@section('title','List Order')

@section('konten')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            Table Order
                        </div>
                        <table class="table-border table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Custumer</th>
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
