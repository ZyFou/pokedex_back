<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeInteractionState extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'multiplier'
    ];

    public function typeInteractions()
    {
        return $this->hasMany(TypeInteraction::class, 'type_interaction_state_id');
    }
}
