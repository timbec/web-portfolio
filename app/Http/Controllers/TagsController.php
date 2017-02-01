<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag; 

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts; 

        $tags = 'Tag'; 

        $works = $tag->works; 

        return view('tags.index', compact('tag', 'posts', 'works')); 
    }
}
