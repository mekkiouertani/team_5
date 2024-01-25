<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/types.json');
        $data = json_decode($json, true);

        foreach ($data as $item) {
            $newType = new Type();
            $newType->name = $item['name'];
            $newType->image = $item['image'];
            $newType->desc = $item['desc'];
            $newType->save();
        }
    }
}


// storage/app/public/images/types/image1x1.png
