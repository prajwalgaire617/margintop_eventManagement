<?php

namespace Database\Seeders;

use App\Models\EventModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        EventModel::create([
            'title' => 'react workshop',
            'description' => 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type',
            'date' => '2024-10-17',
            'location' => 'Kathmandu',
            'category_id' => 1
        ]);

        EventModel::create([
            'title' => 'OSM workshop',
            'description' => 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type',
            'date' => '2024-10-17',
            'location' => 'Kathmandu',
            'category_id' => 1
        ]);

        EventModel::create([
            'title' => 'National Conference on Data and Computing',
            'description' => 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type',
            'date' => '2024-08-22',
            'location' => 'Kathmandu university, Dhulikhel',
            'category_id' => 2
        ]);

        EventModel::create([
            'title' => 'Data analytics',
            'description' => 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type',
            'date' => '2024-10-17',
            'location' => 'Pulchowk',
            'category_id' => 1
        ]);

        EventModel::create([
            'title' => 'Apple launch event',
            'description' => 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type',
            'date' => '2024-10-17',
            'location' => 'Sanepa',
            'category_id' => 3
        ]);
    }
}
