<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/characters.json');
        $data = json_decode($json, true);

        foreach ($data as $item) {
            $newCharacter = new Character();
            $newCharacter->name = $item['name'];
            $newCharacter->image = $item['image'];
            $newCharacter->description = $item['description'];
            $newCharacter->type_id = $item['type_id'];
            $newCharacter->attack = $item['attack'];
            $newCharacter->defence = $item['defence'];
            $newCharacter->speed = $item['defence'];
            $newCharacter->life = $item['life'];

            $newCharacter->save();

            $newCharacter->items()->sync($item['items'] ?? []);
        }
    }
}
