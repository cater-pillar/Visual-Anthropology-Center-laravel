<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Applicant;

class ApplicantController extends Controller
{


    // ***********************
    public function index()
    {

        $applicants = null;

        if (request('program_id')) {
            $applicants = Applicant::where(
                'program_id',
                request('program_id')
            )
                ->get();
        };

        return view('applicants', [
            'programs' => Program::all(),
            'applicants' => $applicants,
        ]);
    }
    // ************************
    public function create($slug)
    {
        return view('apply', [
            'slug' => $slug,
            'programs' => Program::all()
        ]);
    }

    //*********************** */
    public function store()
    {

        $attributes = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'program_id' => ['required']
        ]);

        $appicant = Applicant::create($attributes);
        $appicant->save();
        return redirect('/programs')->with('success', 'Your application was successful');
    }
}
