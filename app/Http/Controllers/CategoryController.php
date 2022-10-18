<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::where('status',0)->get();
        $trash = category::where('status',1)->get();
        return view('backend.category.index',compact('category','trash'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=new category;
       $category->title=$request->title;
       $category->details=$request->details;
       if ($request->file("image")){
           $file = $request->file("image");
           $extension = $file->getClientOriginalExtension();
           $filename = time() . "." . $extension;
           $file->move('uploads/category_image', $filename);
           $category->image = $filename;
        }
       $category->save();
       return redirect('/category/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category,$id)
    {
        $category= category::find($id);
        return view('backend.category.show',['categoryData'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category,$id)
    {
        $category=category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $category = category::find($request->id);
       $category->title= $request->title;
       $category->details= $request->details;
       if ($request->file("image")){
           $file = $request->file("image");
           $extension = $file->getClientOriginalExtension();
           $filename = time() . "." . $extension;
           $file->move('uploads/category_image', $filename);
           $category->image = $filename;
        }
       $category->save();
       return redirect('/category/index')->with('msg','Category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */

    public function status($status,$id){
        $category=category::find($id);
        $category->status=$status;
        $category->save();
        if ($status == 0) {
            return redirect()->back()->with("msg", "Customer restored successfully.");
        } else {
            return redirect()->back()->with("msg", "Customer added to trash successfully.");
        }
    }
}
