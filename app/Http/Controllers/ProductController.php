<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function findAll()
    {
        $data = Products::paginate(
            100,
            ['id', 'title', 'category', 'price', 'stock', 'free_Shipping', 'rate']
        );
        if (count($data) == 0) {
            return $this->out(data: [], status: 'kosong', code: 204);
        } else {
            return $this->out(data: $data, status: 'OK');
        }
    }
    public function findOne(Products $produk)
    {
        return $this->out(data: $produk, status: 'Ok');
    }
}
