<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allcategory()
    {
        $category=Category::all();
       return view('all_category',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecategory(Request $request)
    {
        $validated = $request->validate([
            'CategoryTitle' => ['required','unique:categories,title', 'string', 'min:3'],

        ]);
        $category=new Category();
        $category->title = $request->CategoryTitle;
        if(Auth::check()){
            $category->author= Auth::user()->username;
        }
        else{
            $category->author='admin';
        }

        $category->save();
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
    public function deletecategory($id)
    {
        $category=Category::find($id);
        $category->delete();
        Session::flash('msg','Data successfully deleted');
        return redirect()->back();
    }
}
