<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{

    public function bookings() {
        return $this->morphedByMany('App\Booking', 'updatable');
    }
}
