<?php

namespace App\Http\Controllers;

use App\Resume;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function index()
    {
        return view('students.resumes');
    }

    public function create()
    {

        return view(
            'resumes.create',

        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'file_resume' => 'required|file',
            'file_name' => 'required',

        ]);
        $user = Student::where('user_id', Auth::user()->id)->first();



        //dd($request->is_dafault);
        //move file

        $file_resume = $request->file('file_resume');
        $ext = $file_resume->getClientOriginalExtension();
        $name = "resume-" . uniqid() . ".$ext";

        $file_resume->move(\public_path('uploads/resumes'), $name);

        // dd($name);

        Resume::create([

            'file_name' => $request->file_name,
            'file_resume' => $name,
            'user_id' => Auth::user()->id,
            'is_default' => $request->is_dafault,
            'student_id' => $user->id
        ]);

        return redirect(route('students.index'));
    }

    public function delete($id)
    {
        $resume = Resume::findOrFail($id);

        unlink(\public_path('uploads/resumes/') . $resume->file_resume);

        $resume->delete();

        return back();
    }
}
