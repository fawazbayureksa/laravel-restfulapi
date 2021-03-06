<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Products;
use Carbon\Carbon;

class OrderController extends BaseController
{
    public function __construct()
    {
        $this->middleware('authorization');
    }

    public function store()
    {
        $products = Products::find(\request('product_id'));
        if ($products == null) //jika produk tidak ditemukan
        {
            return $this->out(status: 'Gagal', code: 404, error: 'Produk tidak ditemukan');
        }
        $order = new Orders();
        $order->order_date = Carbon::now('Asia/Makassar');
        $order->product_id = $products->id;
        $order->costumer_id = request('costumer_id');
        $order->qty = request('qty');
        $order->price = $products->price;

        if ($order->save() == true) //jika berhasil menyimpan
        {
            return $this->out(data: $order, status: 'Ok', code: 201);
        } else {
            return $this->out(status: 'gagal', error: ['Order gagal di simpan'], code: 504);
        }
    }
    public function findAll()
    {
        $order = Orders::query()
            ->leftjoin('costumers', 'costumers.id', '=', 'orders.costumer_id')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id');
        if (request()->has('q')) //jika ada query "q" untuk pencarian
        {
            $q = request('q');
            $order->where('products.title', 'like', "%$q%");
        }
        $data = $order->paginate(
            10,
            [
                'orders.*',
                'costumers.first_name',
                'costumers.last_name', 'costumers.address', 'costumers.city', 'products.title as product_title'
            ]
        );
        return $this->out(data: $data, status: 'OK');
    }

    public function update(Orders $order)
    {
        $products = Products::find(request('product_id'));

        if ($products == null) //jika produk yang dicari tidak ditemukan
        {
            return $this->out(status: 'Gagal', code: 404, error: ['Produk tidak ditemukan']);
        }

        $order->product_id = $products->id;
        $order->costumer_id = request('costumer_id');
        $order->qty = request('qty');
        $order->price = $products->price;

        $hasil = $order->save();

        return $this->out(
            status: $hasil ? "OK" : 'Gagal',
            data: $hasil ? $order : null,
            error: $hasil ? null : ['Gagal mengubah data'],
            code: $hasil ? 201 : 504
        );
    }

    public function delete(Orders $order)
    {
        $hasil = $order->delete();

        return $this->out(
            status: $hasil  ? "OK" : "Gagal",
            data: $hasil ? $order : null,
            error: $hasil ? null : ['Gagal menghapus data'],
            code: $hasil ? 200 : 504,
        );
    }

    public function find($id)
    {
        // return $this->out(data:$order , status:'OK')
        return Orders::find($id);
    }
}
