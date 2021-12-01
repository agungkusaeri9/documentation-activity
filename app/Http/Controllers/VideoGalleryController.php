<?php

namespace App\Http\Controllers;

use App\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $items = VideoGallery::latest()->paginate(1);
        return view('pages.video-gallery.index',[
            'title' => 'Galeri Video',
            'items' => $items
        ]);
    }

    public function store()
    {
        request()->validate([
            'url' => ['required'],
            'category' => ['required']
        ]);

        $data = request()->all();
        VideoGallery::create($data);

        return redirect()->route('video-galleries.index')->with('success','Galeri Video berhasil ditambahkan');
    }
}
