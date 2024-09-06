<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolutionTriggerTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'evolution_trigger_id',
        'locale',
        'name'
    ];

    protected $casts = [
        'evolution_trigger_id' => 'integer',
    ];

    public function evolutionTrigger()
    {
        return $this->belongsTo(EvolutionTrigger::class);
    }
}
