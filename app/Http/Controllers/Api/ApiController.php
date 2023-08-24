<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Approach;
use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\Post;

class ApiController extends Controller
{
    public function getposts(Request $request)
    {
        try {
            $posts = Post::all();
            return response()->json([
                'ok'=>true,
                'posts'=>$posts,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }
    public function getcategories(Request $request)
    {
        try {
            $posts = Category::all();
            return response()->json([
                'ok'=>true,
                'posts'=>$posts,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }
    public function getapproaches(Request $request)
    {
        try {
            $posts = Approach::all();
            return response()->json([
                'ok'=>true,
                'posts'=>$posts,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }
    public function getgroups(Request $request)
    {
        try {
            $posts = Group::all();
            return response()->json([
                'ok'=>true,
                'posts'=>$posts,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }

}
