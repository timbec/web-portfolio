<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

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
      $posts = Post::paginate(5);

      return view('blog.index', compact('posts'));

   }

   public function post($slug)
   {


     $post = Post::where('slug', $slug)->firstOrFail();

     //return $post;
     return view('blog.post', compact('post'));

   }
}
