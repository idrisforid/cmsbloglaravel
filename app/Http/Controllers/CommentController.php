<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allcomment()
    {
        $comment=Comment::all();
        $appcomment=DB::table('comments')
                 ->select('*')->where('status','=','ON')->get();
        $discomment=DB::table('comments')
                 ->select('*')->where('status','=','OFF')->get();

                 return view('all_comments',compact('appcomment','discomment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function commentcount($id)
    // {
    //     $appcomment = DB::table('comments')
    //     ->where('post_id', '=', $id)
    //     ->where('status', '=', 'ON')
    //     ->count();
    //     // $disappcomment = DB::table('comments')
    //     // ->where('id', '=', $id)
    //     // ->where('status', '=', 'ON')
    //     // ->get();

    //     return view('dashboard',compact('appcomment'));
    // }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecomment(Request $request,$id)
    {
        $comment = new Comment();
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->comment=$request->comment;
        if (Auth::check())
        {
            $comment->approvedby= Auth::user()->username ;
        }
        else{
            $comment->approvedby= 'admin' ;
        }
        $comment->status='OFF';
        $comment->post_id=$id;
        $comment->save();
        Session::flash('msg','comment successfully Added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approvecomment($id)
    {
        $comment= Comment::find($id);
        $comment->status='ON';
        $comment->update();
        Session::flash('msg','comment successfully approved');
        return redirect()->back();
    }

    public function disapprovecomment($id)
    {
        $comment= Comment::find($id);
        $comment->status='OFF';
        $comment->update();
        Session::flash('msg','comment successfully disapproved');
        return redirect()->back();
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
    public function deletecomment($id)
    {
        $comment= Comment::find($id);
        $comment->delete();
        Session::flash('msg','comment successfully deleted');
        return redirect()->back();
    }
}
