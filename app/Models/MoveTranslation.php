<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoveTranslation extends Model
{
    use HasFactory;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        'move_id',
        'locale',
        'name',
        'description',
    ];

    protected $casts = [
        'move_id' => 'integer',
    ];

    public function move()
    {
        return $this->belongsTo(Move::class);
    }
}
