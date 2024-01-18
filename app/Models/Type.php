<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Character;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
    protected $guarded = [];

    public function characters()
    {
        //dd($this->hasMany(Character::class));
        return $this->hasMany(Character::class);
    }
}
