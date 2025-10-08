<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{

    public function index()
    {
        $photos = Photo::latest()->get();
        return view('photos.index', compact('photos'));
    }


    public function create()
    {
        return view('photos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file'  => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads', $filename, 'public');

        Photo::create([
            'title'     => $request->title,
            'file_path' => $path,
        ]);

        return redirect()->route('photos.index')
                         ->with('success', 'Rasm muvaffaqiyatli yuklandi!');
    }


    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }


    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }


    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('file')) {

            Storage::disk('public')->delete($photo->file_path);

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');

            $photo->file_path = $path;
        }

        $photo->title = $request->title;
        $photo->save();

        return redirect()->route('photos.index')
                         ->with('success', 'Rasm muvaffaqiyatli yangilandi!');
    }


    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete($photo->file_path);
        $photo->delete();

        return back()->with('success', 'Rasm muvaffaqiyatli ochirildi!');
    }
}
