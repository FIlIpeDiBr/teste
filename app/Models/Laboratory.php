<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laboratory extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'description'
    ];

    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string';

    public function day(): HasMany{
        return $this->hasMany(Day::class);
    }
}
