<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Character;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'slug', 'category', 'type', 'weight', 'cost', 'image'];

    public static function getSlug($title)
    {
        $slug = Str::of($title)->slug('-');
        $count = 1;

        while (Item::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }

    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}
