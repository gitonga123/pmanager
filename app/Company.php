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
}
