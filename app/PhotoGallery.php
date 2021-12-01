<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    protected $guarded = ['id'];
    public function photo()
    {
        return asset('storage/' . $this->photo);
    }
}
