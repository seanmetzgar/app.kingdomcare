<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kodeine\Metable\Metable;

class User extends Authenticatable
{
    use Notifiable, Metable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'api_token',
        'last_login_at',
        'last_login_ip',
        'last_active_at',
        'last_active_ip',
        'city',
        'region',
        'phone',
        'dob',
        'registration_complete',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token', 'dob', 'phone'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function reviewsSent() {
        return $this->hasMany(Review::class, 'review_by_id');
    }

    public function reviewsReceived() {
        return $this->hasMany(Review::class, 'review_for_id');
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    /**
     * @param array|string $roles
     * @return bool
     */
    public function authorizeRoles($roles) {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }

    /**
     * Check multiple roles
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole($roles) {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * Check one role
     * @param string $role
     * @return bool
     */
    public function hasRole($role) {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function getAverageRatingAttribute() {
        $reviews = $this->reviewsReceived;
        $ratings = array();

        if ($reviews !== null) {
            foreach ($reviews as $review) {
                $rating = $review->rating;
                if (is_numeric($rating)) {
                    array_push($ratings, $rating);
                }
            }
        }

        $average = (count($ratings) > 0) ? (int)round(array_sum($ratings) / count($ratings)) : null;

        return $average;
    }
}
