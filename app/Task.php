<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $dates = ['created_at', 'updated_at'];

    public function complete()
    {

    }

    public function uncomplete()
    {

    }

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function assignedTo()
    {
        return $this->belongsTo('App\User');
    }
}
