<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traveller extends Model
{
    protected $primaryKey = 'TravellerId';
    protected $fillable = ['TravellerName', 'TravellerPassport', 'TravellerAge', 'TravellerDOB'];

    public function places()
    {
        return $this->belongsToMany('App\Models\place', 'traveller_place', 'traveller_id', 'place_id')->withPivot('Note')->withTimestamps();
    }
}
