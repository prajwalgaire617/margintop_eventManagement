<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        CategoryModel::create([
            'name' => 'workshop'
        ]);
        CategoryModel::create([
            'name' => 'conference'
        ]);

        CategoryModel::create([
            'name' => 'launch event'
        ]);
    }
}
