<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/users.json');
        $data = json_decode($json, true);

        foreach ($data as $item) {
            $newUser = new User();
            $newUser->name = $item['name'];
            $newUser->email = $item['email'];
            $newUser->password = $item['password'];
            $newUser->save();
        }
    }
}
