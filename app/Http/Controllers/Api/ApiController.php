<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function index(){
        $post=Post::all();
        if($posts){
            return response()->json(['data'=>$posts],200);
        }else{
            return response()->json(['data'=>'No Posts'],404);
        }

    }

    //GET /id
    function show(Post $post){

    }
    //POST
    function store(Request $request){

    }
    //PUT /id
    function update(Request $request,Post $post){

    }
    //DELETE /id
    function destroy(Post $post){

    }
}
