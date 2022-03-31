<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin_login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alladmin()
    {
       $admin=User::all();
       return view('admin.all_admin',compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeadmin(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'aname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        $admin = new User();

        $admin->username = $request->username;
        $admin->aname = $request->aname;

        $admin->password = Hash::make($request->password);
        if(Auth::check()){
            $admin->addedby= Auth::user()->username;
        }
        else{
            $admin->addedby='admin';
        }

        $admin->save();
        Session::flash('msg','Data successfully inserted');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletedmin($id)
    {
        $admin=User::find($id);
        $admin->delete();
        Session::flash('msg','Data successfully deleted');
        return redirect()->back();
    }
}
