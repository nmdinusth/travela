<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'customer'],
        ]);

        // ĐĂNG NHẬP - Note (eamil hiện tại đang không có unique)
        // trường hợp đã xác nhận email chưa bật 2fa
        // trường hợp đã xác nhận email bật 2fa
        // trường hợp chưa xác nhận email
        DB::table('users')->insert([
            [
                'username' => 'dinhDuc',
                'email' => 'nguyendinhduc.yb.k03@gmail.com',
                'password' => Hash::make('123456'),
                'status' => 'active',
                'is_2fa_enabled' => false,
                'role_id' => CUSTOMER_ROLE_ID,
            ],
            // [
            //     'username' => 'minhDuc', 
            //     'email' => 'dien email của anh vaooo',
            //     'password' => Hash::make('dien mat khau vao day '),
            //     'status' => 'active', // de active mà dang nhap, dang ky em chua lam
            //     'is_2fa_enabled' => true, // true thì xác thực 2 bước đưuọc gửi otp qua mail, false thì đăng nhập thẳng
            //     'role_id' => CUSTOMER_ROLE_ID,
            // ],
        ]);
    }
}
