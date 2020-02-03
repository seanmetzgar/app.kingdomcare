<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'review_by_id',
        'review_for_id',
        'rating',
        'content'
    ];

    public function getRatingAttribute($value) {
        if ($this->rating_hidden) {
            return null;
        } else {
            return $value;
        }
    }
}
