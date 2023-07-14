<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_content = Storage::get('MOCK_DATA_providers.json');
        $providers = json_decode($file_content);

        foreach ($providers as $provider) {
            DB::table('providers')->insert(
                [
                    'first_name' => $provider->first_name,
                    'last_name' => $provider->last_name,
                    'email' => $provider->email,
                    'password' => Hash::make($provider->password),
                    'contact' => $provider->contact,
                    'address1' => $provider->address1,
                    'address2' => $provider->address2,
                ]
            );
        }
    }
}
