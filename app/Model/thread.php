<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class thread extends Model
{
    protected $guarded=[];
    
    public function path()
    {
        return "/thread/{$this->channel->slug}/{$this->id}";
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    protected function channel()
    {
        return $this->belongsTo(Channel::class);
    }



}
