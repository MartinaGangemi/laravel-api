<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index (){
        $posts = Post ::with(['tags','category','user'])->orderByDesc('id')->paginate(10);
    
        return $posts;
    }
}
