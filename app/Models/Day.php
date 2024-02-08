<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'laboratory_id',
        'date'
    ];

    public function timeslot(): HasMany{
        return $this->hasMany(Timeslot::class);
    }

    public function laboratory(): BelongsTo{
        return $this->belongsTo(Laboratory::class);
    }
}
