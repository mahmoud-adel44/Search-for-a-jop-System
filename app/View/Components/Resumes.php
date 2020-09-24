<?php

namespace App\View\Components;

use App\Resume;
use App\Student;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Resumes extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // $user = Student::where('user_id', Auth::user()->id)->first();
        // $resumes = Resume::where('student_id', $user->id)->get();
        //----------------------------------------------------------

        $resumes = Auth::user()->student->resumes;
        // $resumes = Auth::user()->student()->resumes;
        return view('components.resumes', compact('resumes'));
    }
}
