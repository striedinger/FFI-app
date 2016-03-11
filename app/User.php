<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password', 'city', 'state_id', 'phone', 'company_id', 'active'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($role){
        return $this->role_id === $role;
    }

    public function isAdmin(){
        return ($this->hasRole("1") || $this->hasRole("2") || $this->hasRole("3"));
    }

    public function isSuperAdmin(){
        return $this->hasRole("1");
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
