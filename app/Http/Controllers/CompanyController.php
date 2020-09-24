<?php

namespace App\Http\Controllers;

use App\Jop;
use App\Company;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class CompanyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $company = Company::where('user_id', Auth::user()->id)->first();
    // $jops = Jop::where('company_id', $company->id)->get();
    $jops = Auth::user()->company->jops;
    // dd($jops);


    // $jop = Jop::findOrFail($id->id);

    // $jop_id = $jop->id;
    // $students = Student::wherePivot("jop_id", $jop_id)->get();

    // $data = DB::table('jop_student')->get();
    // dd($company);
    // dd($user);
    return view(
      'companies.index',
      [
        'company' => $company,
        'jops' => $jops,
        // 'students' => $students,
      ]
    );
  }
  public function show(Request $request, $id)
  {
    $jop = Jop::findOrFail($id);
    $data = DB::table('jop_student')->where('jop_id', $id)->get();

    return view('companies.show', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view(
      'companies.create',

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

      'name' => 'required|string',

      'location' => 'required|string',
      'city' => 'required|string',



    ]);



    Company::create([

      'name' => $request->name,

      'location' => $request->location,
      'city' => $request->city,


      'user_id' => Auth::user()->id,
    ]);

    return redirect(route('companies.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Company  $company
   * @return \Illuminate\Http\Response
   */


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request, $id)
  {

    $company = Company::findOrFail($id);


    return view('companies.edit', compact('company'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required|string',
      'location' => 'required|string',
      'city' => 'required|string',
    ]);

    $company = Company::findOrFail($id);

    $company->update([
      'name' => $request->name,
      'location' => $request->location,
      'city' => $request->city,
      'user_id' => Auth::user()->id,
    ]);
    // dd($company);

    return redirect(\route('companies.index'));
  }

  public function approve($id)
  {
    $data = DB::table('jop_student')->where('id', $id)->first();
    DB::table('jop_student')->where('id', $id)->update(['status' => 1]);
    // dd($data);
    $student = Student::where('id', $data->student_id)->update(['approved' => 'approved', 'varified' => 'varified', 'condition' => 'employeed']);
    $jop = Jop::where('id', $data->jop_id)->update(['status' => 0]);
    return back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    // $data = DB::table('jop_student')->where('id', $id)->first();
    // $data->delete();
    DB::table('jop_student')->where('id', $id)->delete();

    return back();
  }
}
