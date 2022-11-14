<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        $admin = User::create(
          [
            'name' => 'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt("admin@123")
          ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
