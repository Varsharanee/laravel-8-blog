<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = post::where('status',0)->get();
        $trash = post::where('status',1)->get();
        return view('backend.post.index',compact('post','trash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_data=DB::table('categories')->get();
        return view('backend.post.create',compact('category_data'));
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
        $post= DB::table('posts')
                ->join('categories','categories.id','posts.cat_id')
                ->select('posts.*','categories.title as ctitle')
                ->where('posts.id',$id)->first();
        $Comments= DB::table('comments')->where('post_id',$id)->get();
        return view('backend.post.show',compact('post','Comments'));
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
        $yourCategory=category::where('id',$post->cat_id)->first();
        $category_id=category::get();
        return view('backend.post.edit',compact('post','category_id','yourCategory'));
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
       return redirect('/post/index')->with('msg','Post Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    
    public function status($status,$id){
        $post=post::find($id);
        $post->status=$status;
        $post->save();
        if ($status == 0) {
            return redirect()->back()->with("msg", "Customer restored successfully.");
        } else {
            return redirect()->back()->with("msg", "Customer added to trash successfully.");
        }
    }
}
