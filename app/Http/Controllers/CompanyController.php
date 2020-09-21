<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // dd($company);
    // dd($user);
    return view(
      'companies.index',
      compact('company')
    );
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
  public function show(Company $company)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request,$id)
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

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function destroy(Company $company)
  {
    //
  }
}
