<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_user_id',
        'provider',
        'token',
        'tokenSecret',
        'refreshToken',
        'expires'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
