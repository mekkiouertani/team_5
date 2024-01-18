<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Character extends Model
{
    use HasFactory;



    protected $fillable = ['name', 'description', 'type_id', 'attack', 'defence', 'speed', 'life', 'image'];

    public function items()
    {
        return $this->belongsToMany(Item::class);

    }
      public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
