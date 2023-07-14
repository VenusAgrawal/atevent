<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_content = Storage::get('MOCK_DATA_events.json');
        $events = json_decode($file_content);

        foreach ($events as $event) {
            DB::table('events')->insert(
                [
                    'event_name' => $event->event_name,
                    'properties_id' => $event->properties_id,                 
                ]
            );
        }
    }
}
