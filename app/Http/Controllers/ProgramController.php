<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Program;
use App\Models\Tab;
use App\Traits\TabFinder;
use App\Traits\StoreImage;

class ProgramController extends Controller
{

    use TabFinder;
    use StoreImage;

    // ***********************
    public function home()
    {
        return view('home', [
            'programs' => Program::orderBy('created_at', 'desc')->get(),
        ]);
    }
    // ***********************
    public function index()
    {

        return view('programs', [
            'programs' => Program::orderBy('created_at', 'desc')->get(),
        ]);
    }
    // ************************
    public function show($slug)
    {
        return view('program', [
            'program' => Program::where('slug', $slug)->first()
        ]);
    }
    //********************* */
    public function create()
    {
        return view('create-program');
    }
    //*********************** */
    public function store()
    {

        $matched_title_content = $this->connectTitleWithContent(
            $this->getTabTitleKeys(),
            $this->getTabContentKeys()
        );

        $attributes = request()->validate([
            'title' => ['required', 'unique:programs'],
            'poster' => ['required'],
            'extract' => ['required'],
            'icon' => ['required']
        ]);

        $attributes['icon'] = $this->storeImage($attributes['title'], 'icon');
        $attributes['poster'] = $this->storeImage($attributes['title'], 'poster');
        $attributes['slug'] = request('title');

        $program = Program::create($attributes);

        foreach ($matched_title_content as $tab) {
            request()->validate([
                $tab['title'] => ['required'],
                $tab['content'] => ['required']
            ]);
            $program->tabs()->save(
                new Tab([
                    'title' => request($tab['title']),
                    'content' => request($tab['content'])
                ])
            );
        }
        $program->save();
        return redirect('/programs')->with('success', 'Program successfully created');
    }

    //******************************** */
    public function destroy($slug)
    {
        Program::where('slug', $slug)->first()->delete();
        return redirect('/programs')->with('success', 'Program deleted!');
    }
    //******************************** */
    public function edit($slug)
    {
        return view('edit-program', [
            'program' => Program::with('tabs')
                ->where('slug', $slug)->first()
        ]);
    }
    //********************************** */
    public function update($slug)
    {
        
        $matched_title_content = $this->connectTitleWithContent(
            $this->getTabTitleKeys(),
            $this->getTabContentKeys()
        );

        $attributes = request()->validate([
            'title' => ['required'],
            'extract' => ['required'],
        ]);

        $program = Program::where('slug', $slug)->first();

        foreach ($matched_title_content as $tab) {
            request()->validate([
                $tab['title'] => ['required'],
                $tab['content'] => ['required']
            ]);
            $program->tabs()->updateOrCreate(
                [
                    "program_id" => $program->id,
                    "title" => request($tab['title'])
                ],
                [
                    "title" => request($tab['title']),
                    "content" => request($tab["content"])
                ]
            );
        }

        if (request()->file('icon')) {
            $program->icon = $this->storeImage(
                $attributes['title'],
                'icon'
            );
        }

        $program->title = $attributes['title'];
        if (request()->file('poster')) {
            $program->poster = $this->storeImage(
                $attributes['title'],
                'poster'
            );
        }

        $program->title = $attributes['title'];
        $program->slug = $attributes['title'];
        $program->extract = $attributes['extract'];

        if(request('active')) {
            $program->is_active = 1;
        } else {
            $program->is_active = 0;
        }

        $program->save();

        return redirect('/programs')->with('success', 'Program successfully updated');
    }
}
