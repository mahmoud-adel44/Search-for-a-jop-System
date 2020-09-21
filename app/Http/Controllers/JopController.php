<?php

namespace App\Http\Controllers;

use App\Company;
use App\Jop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JopController extends Controller
{
  public function index()
  {
    return view('companies.jops');
  }

  public function create()
  {

    return view(
      'jops.create',
    );
  }

  public function store(Request $request)
  {
      //validation
      $request->validate([
          'jop_title' => 'required',
          'location' => 'required',
          'status' => 'required',

      ]);
      $user = Company::where('user_id', Auth::user()->id)->first();





      // dd($name);

      Jop::create([

          'jop_title'=> $request->jop_title,
          'company_id' => $user->id,
          'location' => $request->location,
          'status' => $request->status,
          
      ]);

      return redirect(route('companies.index'));
  }

  public function delete($id)
  {
      $jop = Jop::findOrFail($id);
      
      
  
      $jop->delete();

      return back();
  }
}
