<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(){
        $posts=post::all();
        return view('dashboard',compact('posts'));
    }
    public function about(){
        return view('frontend.about');
    }
    public function contact(){
        return view('frontend.contact');
    }
    //Post Details
    public function post($slug, $id){
        $detail_post=post::find($id);
        return view('frontend.post',compact('detail_post'));
    }
    //save comment
    public function save_comment(Request $request,$slug, $id){
        $request->validate([
            'comment'=>'required'
        ]);
        $data=new comment;
        $data->user_id=Auth::id();
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();

        return redirect('post/'.$slug.'/'.$id)->with('success','Comment has been submitted.');
        
    }
}
