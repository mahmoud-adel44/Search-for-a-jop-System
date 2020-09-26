<?php

namespace App\Http\Controllers;

use App\Company;
use App\Jop;
use App\Resume;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $user = Student::where('user_id', Auth::user()->id)->first();
    // $jops = Jop::all();
    $jops = Jop::where('status', 1)->get();

    $resumes = Resume::where('student_id', $user->id)->get();
    // dd($user);
    return view(
      'students.index',
      [
        'user' => $user,
        'jops' => $jops,
        'resumes' => $resumes,
      ]
    );
  }
  public function search(Request $request)
  {
    $keyword = $request->keyword;
    $jops =   Jop::where('jop_title', 'like', "%$keyword%")->get();
    return response()->json($jops);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    return view(
      'students.create',

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
      'title' => 'required|string|max:100',
      'name' => 'required|string',
      'condition' => 'required|string',
      'location' => 'required|string',
      'city' => 'required|string',
      'coverLetter' => 'required|string',

      'img' => 'required|image',
    ]);

    //move image

    $img = $request->file('img');
    $ext = $img->getClientOriginalExtension();
    $name = uniqid() . ".$ext";

    $img->move(\public_path('uploads/images'), $name);



    Student::create([
      'title' => $request->title,
      'name' => $request->name,
      'condition' => $request->condition,
      'location' => $request->location,
      'city' => $request->city,
      'coverLetter' => $request->coverLetter,
      'img' => $name,
      'user_id' => Auth::user()->id,
    ]);

    return redirect(route('students.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request, $id)
  {

    $student = Student::findOrFail($id);


    return view('students.edit', compact('student'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $student = Student::findOrFail($id);
    $request->validate([
      'title' => 'required|string|max:100',
      'name' => 'required|string',
      'condition' => 'required|string',
      'location' => 'required|string',
      'city' => 'required|string',
      'coverLetter' => 'required|string',

      'img' => 'nullable|image',
    ]);




    // dd($blog->img);
    $name_img = $student->img;

    if ($request->hasFile('img')) {
      if ($name_img !== null) {
        unlink(\public_path('uploads/images/' . $name_img));
      }
      $img = $request->file('img');
      $ext = $img->getClientOriginalExtension();
      $name_img = uniqid() . ".$ext";

      $img->move(\public_path('uploads/images'), $name_img);
    }




    $student->update([
      'title' => $request->title,
      'name' => $request->name,
      'condition' => $request->condition,
      'location' => $request->location,
      'city' => $request->city,
      'coverLetter' => $request->coverLetter,
      'img' => $name_img,
    ]);

    return redirect(\route('students.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  // public function destroy(Student $student)
  // {
  //     //
  // }

  public function apply($id)
  {

    $jop = Jop::where('id', $id)->first();
    // $company = Company::where('id', $jop->company_id)->first();
    //------------------------------------------------
    // $company = Auth::user()->company->jops;
    //------------------------------------------------

    $user = Student::where('user_id', Auth::user()->id)->first();
    $resumes = Resume::where('student_id', $user->id)->get();

    return view(
      'students.apply',
      [
        'jop' => $jop,
        'resumes' => $resumes,

      ]
    );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function sent(Request $request, $id)
  {

    $jop = Jop::findOrFail($id);

    // dd($request->resume_id);
    // dd($request->resume_id);
    // $student = Student::findOrFail($student_id);
    // $jop->students()->sync([$request->resume_id, $request->jop_id]);

    $student = Student::where('user_id', Auth::user()->id)->first();
    // $jop->students()->sync([$student->id, $request->jop_id, $request->resume_id]);
    // dd($request->resume_id);

    //----------------------------------
    // $student->jops()->sync([
    //   'student_id' => $student->id,
    //   'jop_id' => $request->jop_id,
    //   'resume_id' => $request->resume_id
    // ]);
    //-------------------------------------
    // $student = Student::findOrFail($student_id);
    // $student->jops()->sync($id);
    // $student->jops()->sync([
    //   '1' => ['student_id' =>  $student->id],
    //   '2' => ['jop_id' =>  $request->jop_id],
    //   '3' => ['resume_id' => $request->resume_id],

    // ]);

    // $jop->students()->sync([$request->resume_id, $request->jop_id]);
    $jop_id = $request->jop_id;
    $resume_id = $request->resume_id;
    $student->jops()->sync([$jop_id => ['resume_id' => $resume_id]]);

    return redirect(\route('students.index'));
  }
}
