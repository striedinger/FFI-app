<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;

    use SearchableTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password', 'city', 'state_id', 'phone', 'company_id', 'active', 'role_id'
    ];

    protected $searchable = [
        'columns' => [
            'users.name' => 10,
            'users.email' => 10,
        ],
        'joins' => [
            'companies' => ['users.id', 'companies.user_id'],
            'projects' => ['users.id', 'projects.user_id'],
        ]
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
        return ($this->hasRole("1") || $this->hasRole("2") || $this->hasRole("3") || $this->hasRole("4"));
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

    public function projectComments(){
        return $this->hasMany(ProjectComment::class);
    }

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }
}
