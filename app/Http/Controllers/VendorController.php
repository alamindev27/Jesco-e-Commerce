<?php

namespace App\Http\Controllers;

use App\Mail\vendorNotification;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendorPassword = Str::random(9);
        $request->validate([
            'vendor_name' => 'required',
            'vendor_email' => 'required | email',
            'vendor_phone' => 'required',
            'vendor_address' => 'required',
        ]);
        $vendor_info = User::create([
            'name' => $request->vendor_name,
            'email' => $request->vendor_email,
            'phone' => $request->vendor_phone,
            'password' => bcrypt($vendorPassword),
            'role' => 3,
        ]);
        Vendor::insert([
            'user_id' => $vendor_info->id,
            'address' => $request->vendor_address
        ]);
        Mail::to($request->vendor_email)->send(new vendorNotification($vendorPassword));
        return back()->with('vendorSuccess', 'A Vendor addtd successfull.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
