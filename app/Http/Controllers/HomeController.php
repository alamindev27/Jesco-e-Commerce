<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(strpos(url()->previous(), "product/details"))
        {
            return redirect(url()->previous());
        }
        return view('home');
    }

    public function location()
    {
        return view('location.index', [
            'countries' => Country::orderBy('name', 'ASC')->get(['id', 'name', 'status'])
        ]);
    }
    public function locationupdate(Request $request)
    {
        Country::where('status', 'active')->update([
            'status' => 'deactive'
        ]);

        foreach ($request->countries as $country_id) {
            Country::find($country_id)->update([
                'status' => 'active'
            ]);
        }
        return back();
    }
}
