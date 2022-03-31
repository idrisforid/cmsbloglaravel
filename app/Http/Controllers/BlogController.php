<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        $post=DB::table('posts')->limit(5)->get();
        return view('blog',compact('category','post'));
    }

    public function allblog()
    {
        $posts= Post::paginate(4);
        $category=Category::all();
        $allposts=DB::table('posts')->limit(5)->get();
        return view('blog.all_blog',compact('posts','category','allposts'));
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryblog($category)
    {
        $posts=DB::table('posts')->select('*')->where('category','=',$category)->get();
        $category=Category::all();
        $allposts=DB::table('posts')->limit(5)->get();
        return view('blog.category_blog',compact('posts','category','allposts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchblog(Request $request)
    {
        $allposts= DB::table('posts')
        ->limit(5)
        ->get();
        $category=DB::table('categories')->get();
        $posts=DB::table('posts')
        ->select('*')->where('author','like','%'.$request->search.'%')
        ->orWhere('title','like','%'.$request->search.'%')
        ->orWhere('category','like','%'.$request->search.'%')
        ->orWhere('created_at','like','%'.$request->search.'%')
        ->orWhere('post','like','%'.$request->search.'%')
        ->get();
        return view('blog.search_blog',compact('posts','category','allposts'));
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
    public function destroy($id)
    {
        //
    }
}
