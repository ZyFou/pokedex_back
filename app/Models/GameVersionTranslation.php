<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameVersionTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_version_id',
        'locale',
        'name',
    ];

    protected $casts = [
        'game_version_id' => 'integer',
    ];

    public function gameVersion()
    {
        return $this->belongsTo(GameVersion::class);
    }
}
