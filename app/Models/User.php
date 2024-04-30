<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'siape',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($user) {
            if(!filter_var($user->email,FILTER_VALIDATE_EMAIL)) throw new \Exception("O email é inválido");
            
            if(empty($user->password)) throw new \Exception("A senha é necessária");
        });
    }

    public function timeslot() : HasMany{
        return $this->hasMany(Timeslot::class, 'responsible', 'siape');
    }

    public function getAuthIdentifierName(){
        return 'siape';
    }
}
