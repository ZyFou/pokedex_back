<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'locale',
        'name'
    ];

    protected $casts = [
        'type_id' => 'integer',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
