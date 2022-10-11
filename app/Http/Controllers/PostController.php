<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = post::all();
        return view('backend.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_id=category::get();
        return view('backend.post.create',compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=new post;
        $post->user_id=$request->user_id;
        $post->cat_id=$request->cat_id;
        $post->title=$request->title;
        $post->title_discription=$request->title_discription;
        if ($request->file("thumbnail"))
        {
            $file = $request->file("thumbnail");
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/thumbnail_image', $filename);
            $post->thumbnail = $filename;
        }
        if ($request->file("full_image"))
        {
           $file = $request->file("full_image");
           $extension = $file->getClientOriginalExtension();
           $filename = time() . "." . $extension;
           $file->move('uploads/post_image', $filename);
           $post->full_image = $filename;
        }
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->save();
        return redirect('/post/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post,$id)
    {
        $post= post::find($id);
        return view('backend.post.show',['postData'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post,$id)
    {
        $post=post::find($id);
        $category_id=category::get();
        return view('backend.post.edit',compact('post','category_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $post = post::find($request->id);
        $post->user_id=$request->user_id;
        $post->cat_id=$request->cat_id;
        $post->title=$request->title;
        $post->title_discription=$request->title_discription;
        if ($request->file("thumbnail"))
        {
            $file = $request->file("thumbnail");
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/thumbnail_image', $filename);
            $post->thumbnail = $filename;
        }
        if ($request->file("full_image"))
        {
            $file = $request->file("full_image");
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/post_image', $filename);
            $post->full_image = $filename;
        }
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->save();
       return redirect('/post/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post,$id)
    {
        $post= post::find($id);
        $post->delete();
        return redirect('/post/index');
    }
}
