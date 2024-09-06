<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeInteraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_type_id',
        'to_type_id',
        'type_interaction_state_id'
    ];

    public function fromType()
    {
        return $this->belongsTo(Type::class, 'from_type_id');
    }

    public function toType()
    {
        return $this->belongsTo(Type::class, 'to_type_id');
    }

    public function interactionState()
    {
        return $this->belongsTo(TypeInteractionState::class, 'type_interaction_state_id');
    }
}
