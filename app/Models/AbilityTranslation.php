<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbilityTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'ability_id',
        'locale',
        'name',
        'description',
        'effect'
    ];

    protected $casts = [
        'ability_id' => 'integer',
    ];

    public function ability()
    {
        return $this->belongsTo(Ability::class);
    }
}
