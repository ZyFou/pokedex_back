<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoveLearnMethodTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'move_learn_method_id',
        'locale',
        'name',
        'description',
    ];

    protected $casts = [
        'move_learn_method_id' => 'integer',
    ];

    public function moveLearnMethod()
    {
        return $this->belongsTo(MoveLearnMethod::class);
    }
}
