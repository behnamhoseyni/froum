<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];
    
    public function threads()
    {
        return $this->belongsTo(thread::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}