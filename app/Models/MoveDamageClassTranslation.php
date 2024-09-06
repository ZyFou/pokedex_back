<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoveDamageClassTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'move_damage_class_id',
        'locale',
        'name',
        'description',
    ];

    protected $casts = [
        'move_damage_class_id' => 'integer',
    ];

    public function moveDamageClass()
    {
        return $this->belongsTo(MoveDamageClass::class);
    }
}
