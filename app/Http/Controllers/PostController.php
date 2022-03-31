<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allpost()
    {
        $post=Post::all();
        return view('post.all_post',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpost()
    {
        $category=Category::all();
        return view('post.create_post',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storepost(Request $request)
    {
        $post=new Post();
        $post->title = $request->PostTitle;
        $post->category = $request->Category;

        if(Auth::check()){
            $post->author= Auth::user()->username;
        }
        else{
            $post->author='admin';
        }

        if($request->hasfile('image')){
            $destination= 'uploads/posts/'.$post->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/posts',$filename);
            $post->image= $filename;
        }

        $post->post = $request->PostDescription;

        $post->save();
        Session::flash('msg','Data successfully inserted');
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fullpost($id)
    {
        $comment=DB::table('comments')
                 ->select('*')->where('status','=','ON')->where('post_id','=',$id)->get();
        $post=Post::find($id);
        $category=Category::all();
        return view('post.fullpost',compact('post','category','comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editpost($id)
    {
        $post=Post::find($id);
        $category=Category::all();
        return view('post.edit_post',compact('post','category'));
    }

    public function deleteshow($id)
    {
        $post=Post::find($id);
        $category=Category::all();
        return view('post.delete_post',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepost(Request $request, $id)
    {
        $post=Post::find($id);
        $post->title = $request->PostTitle;
        $post->category = $request->Category;

        if(Auth::check()){
            $post->author= Auth::user()->username;
        }
        else{
            $post->author='admin';
        }

        if($request->hasfile('image')){
            $destination= 'uploads/posts/'.$post->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('uploads/posts',$filename);
            $post->image= $filename;
        }

        $post->post = $request->PostDescription;

        $post->update();
        Session::flash('msg','Data successfully inserted');
        return redirect('/all-post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletepost($id)
    {
        $post=Post::find($id);
        $destination= 'uploads/posts/'.$post->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        $post->delete();
        Session::flash('msg','Data successfully deleted');
        return redirect('/all-post');
    }
}
