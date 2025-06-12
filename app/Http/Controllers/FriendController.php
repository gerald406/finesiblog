<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function store(Request $request, User $user){

        //logica paara no agregar a los usuarios que no existen
        $is_from = $request->user()->from()->where('to_id', $user->id)->exists();
        $is_to = $user->from()->where('to_id', $request->user()->id)->exists();
        if($is_from || $is_to){
            return back();
        }

        //logica para no agregarme yo mismo como amigo
        if($request->user()->id === $user->id){
            return back();
        }

        $request->user()->from()->attach($user);
        return back();
    }
}
