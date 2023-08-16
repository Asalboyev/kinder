<?php

namespace App\Http\Controllers;

use App\Models\Approach;
use App\Models\Category;
use App\Models\Group;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard(){

        return view('admin.dashboard');
    }

    public function index()
    {
        $categories = Category::query()->get();
        $posts = Post::query()->get();
        $groups = Group::query()->get();
        $approaches = Approach::where('taken','O\'ng')->get();
        $approachaes = Approach::where('taken','Chap')->get();
        $groups_count = Group::count();
        $posts_count = Post::count();
        $approaches_count = Approach::count();
        return view('index',compact('posts','groups','approaches','approachaes','categories'),[
        'groups_count' => $groups_count,
            'posts_count' => $posts_count,
            'approaches_count'=>$approaches_count,
            ]);
    }
}
