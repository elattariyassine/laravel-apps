<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::where('email', 'yassineattari64@gmail.com')->first();
        $user = DB::table('users')->where('email', 'yassineattari64@gmail.com')->first();
        if(!$user){
            User::create([
                'name' => 'yassine',
                'email' => 'yassineattari64@gmail.com',
                'password' => Hash::make('123456+qs'),
                'role' => 'admin'
            ]);
        }
    }
}
