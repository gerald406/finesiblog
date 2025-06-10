<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(Request $request){
        //dd($request->all());
        //dd($request->get('for_my'));
        //dd($request->user()->id);

        if($request->get('for_my')){
            $posts = Post::where('user_id',$request->user()->id)->latest()->get();
        }else{
            $posts = Post::latest()->get();
        }
        
        return  view('dashboard', compact('posts'));
   
    }
}
