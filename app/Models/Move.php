<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Move extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        'accuracy',
        'move_damage_class_id',
        'power',
        'pp',
        'priority',
        'type_id',
    ];

    protected $casts = [
        'accuracy' => 'integer',
        'power' => 'integer',
        'pp' => 'integer',
        'priority' => 'integer',
        'move_damage_class_id' => 'integer',
        'type_id' => 'integer',
    ];

    public function moveDamageClass()
    {
        return $this->belongsTo(MoveDamageClass::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
