<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestrictedDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'reason'
    ];

    protected $primaryKey = 'date';
    public $incrementing = false;
    protected $keyType = 'date';
    
}
