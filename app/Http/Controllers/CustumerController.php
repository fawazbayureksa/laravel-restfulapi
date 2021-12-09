<?php

namespace App\Http\Controllers;
use App\Models\Costumers;
use Illuminate\Http\Request;

class CustumerController extends BaseController
{
    public function findAll(){
        $data = Costumers::paginate(
            20,
            ['id', 'email', 'first_name', 'last_name', 'city', 'address','token']
        );
        if (count($data) == 0) {
            return $this->out(data: [], status: 'kosong', code: 204);
        } else {
            return $this->out(data: $data, status: 'OK');
        }
    }
}
