<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Slide;
use App\Traits\StoreImage;

class GalleryController extends Controller
{
    use StoreImage;
    //********************* */
    public function index() {
        
        return view('lab', [
            'galleries' => Gallery::all(),
        ]);
    }
    //********************* */
    public function trash() {
        
        return view('trash', [
            'items' => Gallery::onlyTrashed()->orderBy('deleted_at', 'desc')->get(),
            'model' => 'gallery'
        ]);
    }
    //********************* */
    public function restore($slug)
    {
        Gallery::onlyTrashed()->where('slug', $slug)->first()->restore();
        return redirect('/lab')->with('success', 'Gallery restored!');
    }
    //******************************** */
    public function create() {
        return view('create-gallery');
    }
    //********************* */
    public function store() {

        $attributes = request()->validate([
            'title' => ['required', 'unique:galleries'],
            'cover' => ['required', 'image']
        ]);

        request()->validate(['slides.*' => ['image']]);
        
        $attributes['cover'] = $this->storeImage($attributes['title'], 'cover');
        $attributes['slug'] = request('title');
        $attributes['description'] = '';

        $gallery = Gallery::create($attributes);

        $this->storeManyImages($gallery, request('slides'));
        
        $gallery->save();
        return redirect('/lab')->with('success', 'Gallery successfully created');
    }

    
    //********************* */
    public function show($slug) {
        return view('gallery', [
            'gallery' => Gallery::where('slug', $slug)->with('slides')->first()
        ]);
    }

    //******************************** */
    public function destroy($slug)
    {
        Gallery::where('slug', $slug)->first()->delete();
        return redirect('/lab')->with('success', 'Gallery deleted!');
    }
    //******************************** */
    public function delete($slug)
    {
        Gallery::withTrashed()->where('slug', $slug)->first()->forceDelete();
        return redirect('/lab')->with('success', 'Gallery permanently deleted!');
    }
    //******************************** */
    public function edit($slug)
    {
        return view('edit-gallery', [
            'gallery' => Gallery::with('slides')
                ->where('slug', $slug)->first()
        ]);
    }
    //********************************** */
        public function update($slug)
        {
    
            $attributes = request()->validate([
                'title' => ['required'],
                'description' => ['max:700'],
            ]);
    
            $gallery = Gallery::where('slug', $slug)->first();

    
            if (request()->file('cover')) {
                $gallery->cover = $this->storeImage(
                    $attributes['title'],
                    'cover'
                );
            }
    
            $gallery->title = $attributes['title'];
            $gallery->slug = $attributes['title'];
            $gallery->description = $attributes['description'];
    
            $gallery->save();
    
            return redirect('/lab')->with('success', 'Gallery successfully updated');
        }
}
