<?php

namespace App\View\Components;

use App\Jop;
use App\Company;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Jops extends Component
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

        // $user = Company::where('user_id', Auth::user()->id)->first();
        // $jops = Jop::where('company_id', $user->id)->get();
        //---------------------------------------------------------------

        $jops = Auth::user()->company->jops;

        return view('components.jops', compact('jops'));
    }
}
