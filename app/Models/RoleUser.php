<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;


class RoleUser extends Model
{
    protected $table = "users_roles";

    protected $fillable = [
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}