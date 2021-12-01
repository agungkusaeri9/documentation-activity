<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VideoGallery extends Model
{
    protected $guarded = ['id'];

    public function url()
    {
        $link = $this->url;
        $token = Str::after($link,'https://www.youtube.com/watch?v=');
        $new_link = 'https://www.youtube.com/embed/' . $token;

        return $new_link;
    }
}
