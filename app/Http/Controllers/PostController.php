<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $request->user()->posts()->create($request->all());
        return back();
    }
}
