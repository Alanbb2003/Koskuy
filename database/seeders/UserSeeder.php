<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d = new User();
        $d->username = "test";
        $d->fullname = "coba";
        $d->email = "testing@gmail.com";
        $d->password = password_hash("123",PASSWORD_DEFAULT);
        $d->user_telp = "08592212311";
        $d->user_role = 1;
        $d->status = 1;
        $d->save();

        $d = new User();
        $d->username = "pemilik";
        $d->fullname = "coba";
        $d->email = "testing@gmail.com";
        $d->password = password_hash("123",PASSWORD_DEFAULT);
        $d->user_telp = "08592212311";
        $d->user_role = 2;
        $d->status = 1;
        $d->save();
    }
}
