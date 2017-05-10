<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'users_profile';
    public $timestamps = false;

    protected $fillable = [
        'job_title', 'location', 'bio', 'phone', 'gender', 'cell'
    ];

    public function getFillable() {
        return $this->fillable;
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
