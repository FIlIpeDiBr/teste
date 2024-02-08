<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timeslot extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id',
        'responsible',
        'hour'
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class, 'responsible', 'siape');
    }
    public function day() : BelongsTo{
        return $this->belongsTo(Day::class);
    }
}
