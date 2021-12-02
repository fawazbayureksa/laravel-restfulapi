<?php

namespace App\Http\Controllers;

use App\Models\Costumers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth()
    {
        $authheader = \request()->header('Authorization'); //basiccode
        $keyauth = substr($authheader, 6); //menghilangkan text basic

        $plainauth = base64_decode($keyauth); //decode text info login
        $tokenauth = explode(':', $plainauth); //pisahkan password dan email

        $email = $tokenauth[0]; //email
        $pass = $tokenauth[1];  //pass

        $data = (new Costumers())->newQuery()->where(['email' => $email])->get(['id', 'first_name', 'last_name', 'email', 'password'])->fist();

        if ($data == null) //jika data tidak di temukan
        {
            return $this->out(
                status: 'Gagal',
                code: '404', //data tidak ditemukan
                error: ['Pengguna tidak ditemukan'],
            );
        } else {
            if(Hash::check($pass,$data->password) ) //cek jika password cocok
            {

            }
        }
    }
}
