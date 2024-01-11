<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Types;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $json = file_get_contents(__DIR__ . '/data/types.json');
        $content = json_decode($json, true);

        var_dump($content);
        foreach ($content as $item) {
            $item = new Types();
            $item->save();
        }
    }
}
