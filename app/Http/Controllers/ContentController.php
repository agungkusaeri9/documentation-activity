<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Content::with('user')->latest()->get();

        return view('pages.content.index',[
            'title' => 'Data Konten',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.content.create',[
            'title' => 'Tambah Konten'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required'],
            'category' => ['required'],
            'thumbnail' => ['image','mimes:jpg,jpeg,png'],
            'description' => ['required'],
        ]);

        $data = request()->all();
        $data['slug'] = \Str::slug(request('title'));
        if(request()->file('thumbnail'))
        {
            $data['thumbnail'] = request()->file('thumbnail')->store('content','public');
        }else{
            $data['thumbnail'] = NULL;
        }
        auth()->user()->contents()->create($data);

        return redirect()->route('contents.index')->with('success','Konten berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.content.show',[
            'title' => 'Detail Konten',
            'item' => Content::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.content.edit',[
            'title' => 'Edit Konten',
            'item' => Content::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'title' => ['required'],
            'category' => ['required'],
            'thumbnail' => ['image','mimes:jpg,jpeg,png'],
            'description' => ['required'],
        ]);

        $item = Content::findOrFail($id);
        $data = request()->all();
        $data['slug'] = \Str::slug(request('title'));
        if(request()->file('thumbnail'))
        {
            Storage::disk('public')->delete($item->thumbnail);
            $data['thumbnail'] = request()->file('thumbnail')->store('content','public');
        }else{
            $data['thumbnail'] = $item->thumbnail;
        }
        $item->update($data);

        return redirect()->route('contents.index')->with('success','Konten berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Content::findOrFail($id);
        Storage::disk('public')->delete($item->thumbnail);
        $item->delete();
        return redirect()->route('contents.index')->with('success','Konten berhasil dihapus');
    }
}
