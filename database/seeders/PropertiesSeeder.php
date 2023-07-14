<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_content = Storage::get('MOCK_DATA_properties.json');
        $properties = json_decode($file_content);

        foreach ($properties as $property) {
            DB::table('properties')->insert(
                [
                    'title' => $property->title,
                    'description' => $property->description,
                    'size' => $property->size,
                    'price' => $property->price,
                    'nopersons' => $property->nopersons,
                    'houseno' => $property->houseno,
                    'street' => $property->street,
                    'postcode' => $property->postcode,
                    'locality' => $property->locality,
                    'coverphoto' => $property->coverphoto,
                    'coverphoto' => $property->coverphoto,
                    'providers_id' => $property->providers_id,                   
                ]
            );
        }
    }
}
