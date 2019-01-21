<?php

namespace pmanager;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['description', 'name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function comments()
    {
        return $this->morphMany(Company::class, 'commentable');
    }
}
