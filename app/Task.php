<?php

namespace pmanager;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'days', 'hours', 'project_id', 'user_id', 'company_id'];
}
