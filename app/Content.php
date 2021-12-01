<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        if($this->thumbnail)
        {
            return asset('storage/' . $this->thumbnail);
        }else{
            return asset('assets/dist/img/boxed-bg.jpg');
        }
    }
}
