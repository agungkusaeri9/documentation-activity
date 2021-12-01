<?php

namespace App\Http\Controllers;

use App\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $items = PhotoGallery::latest()->paginate(4);
        return view('pages.photo-gallery.index',[
            'title' => 'Galeri Foto',
            'items' => $items
        ]);
    }

    public function store()
    {
        request()->validate([
            'photo' => ['required','image','mimes:jpg,jpeg,png'],
            'category' => ['required']
        ]);

        $data = request()->all();
        $data['photo'] = request()->file('photo')->store('photo-gallery','public');
        PhotoGallery::create($data);

        return redirect()->route('photo-galleries.index')->with('success','Galeri Foto berhasil disimpan');
    }

   public function destroy($id)
   {
        $item = PhotoGallery::findOrFail($id);
        Storage::disk('public')->delete($item->photo);
        $item->delete();
        return redirect()->route('photo-galleries.index')->with('success','Galeri Foto berhasil dihapus');
   }
}
