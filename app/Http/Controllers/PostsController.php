<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
   /**
   * Display the Posts on public facing side.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $posts = Post::orderBy('created_at', 'desc')->paginate(3);

      $tags = Tag::all(); 

      $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')            ->groupBy('year','month')
                  ->orderByRaw('min(created_at) desc')
                  ->get()->toArray();

    
      return view('blog.index', compact('posts', 'tags', 'archives'));

   }

   public function post($slug)
   {

     $post = Post::where('slug', $slug)->firstOrFail();

     $tags = Tag::all(); 

     $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                  ->groupBy('year','month')
                  ->get()->toArray();


     //return $post;
     return view('blog.post', compact('post', 'tags', 'archives'));

   }
}
