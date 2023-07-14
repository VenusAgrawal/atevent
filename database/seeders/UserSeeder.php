<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_content = Storage::get('MOCK_DATA_users.json');
        $users = json_decode($file_content);

        foreach ($users as $user) {
            DB::table('users')->insert(
                [
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'password' => Hash::make($user->password),
                    'contact' => $user->contact,
                    'address1' => $user->address1,
                    'address2' => $user->address2,
                ]
            );
        }
    }
}
