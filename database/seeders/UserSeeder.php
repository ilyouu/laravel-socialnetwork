<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'ten_nguoi_dung' => 'Phan Văn Bằng',
            'email' => 'pvbang23092002@gmail.com',
            'sdt' => '0964196652',
            'password' => Hash::make('123123123'),
        ]);

        User::create([
            'ten_nguoi_dung' => 'Trần Nguyễn Vĩnh Uy',
            'email' => 'uy@gmail.com',
            'sdt' => '0123456789',
            'password' => Hash::make('123123123'),
        ]);
    }
}
