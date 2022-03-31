<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function showprofile ()
    {
        return view('myprofile');
    }


    public function updateprofile (Request $request, $id)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],

        ]);
        $admin=User::find($id);
        $admin->username = $request->username;
        $admin->aheadline = $request->aheadline;
        $admin->abio = $request->abio;

        if($request->hasfile('aimage')){
            $destination= 'uploads/admins/'.$admin->aimage;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('aimage');
            $extension= $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/admins',$filename);
            $admin->aimage= $filename;
        }

        $admin->update();
        Session::flash('msg','Data successfully inserted');
        return redirect()->back();
    }
}
