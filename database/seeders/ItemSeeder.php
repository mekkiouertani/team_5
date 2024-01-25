<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/items.json');
        $data = json_decode($json, true);

        foreach ($data as $item) {
            $newItem = new Item();
            $newItem->name = $item['name'];
            $newItem->type = $item['type'];
            $newItem->image = $item['image'];
            $newItem->category = $item['category'];
            $newItem->weight = $item['weight'];
            $newItem->cost = $item['cost'];
            $newItem->slug = Str::slug($item['name'], '-');
            $newItem->save();

        }
    }
}
