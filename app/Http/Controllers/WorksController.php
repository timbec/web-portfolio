<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Work;
use App\Tag; 

class WorksController extends Controller
{
   /**
   * Display the Posts on public facing side.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function index(Tag $tag=null)
   {
      $works = Work::paginate(5);

      return view('works.index', compact('works'));

   }

   public function work($slug)
   {


     $work = Work::where('slug', $slug)->firstOrFail();

     //return $post;
     return view('works.work', compact('work'));

   }
}
