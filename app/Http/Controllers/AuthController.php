<?php

namespace App\Http\Controllers;

use App\Models\Costumers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class AuthController extends BaseController
{
    public function auth()
    {
        $authheader = \request()->header('Authorization'); //basiccode
        $keyauth = substr($authheader, 6); //menghilangkan text basic
        $plainauth = base64_decode($keyauth); //decode text info login
        $tokenauth = explode(':', $plainauth); //pisahkan password dan email
        $email = $tokenauth[0]; //email
        $pass = $tokenauth[1];  //pass

        $data = (new Costumers())->newQuery()->where(['email' => $email])->get(['id', 'first_name', 'last_name', 'email', 'password'])->first();

        if ($data == null) //jika data tidak di temukan
        {
            return $this->out(
                status: 'Gagal',
                code: '404', //data tidak ditemukan
                error: ['Pengguna tidak ditemukan'],
            );
        } else {
            if (Hash::check($pass, $data->password)) //cek jika password cocok
            {
                $data->token = hash('sha256', Str::random(10)); //token untuk dikirim ke client
                unset($data->password); //hilangkan informasi password yang dikirm ke client
                $data->update(); //update token disimpan ke table costumer

                return $this->out(data: $data, status: 'Ok');
            } else //jika password tidak cocok
            {
                return $this->out(
                    status: 'Gagal',
                    code: 401, //401 unathorized
                    error: ['Password yang dimasukkan salah'],
                );
            }
        }
    }
}
