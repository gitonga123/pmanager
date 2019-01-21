<?php

namespace pmanager;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'days', 'hours', 'project_id', 'user_id', 'company_id'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function company()
    {
        return $this->belongsTo('Pmanager\Models\Company');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Task::class, 'commentable');
    }
}
