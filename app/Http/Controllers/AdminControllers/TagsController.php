<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tag; 

class TagsController extends Controller
{
    
    public function index() 
    {
      $tags = Tag::all();

      return view('vendor.backpack.base.tags.index', compact('tags'));

    }

     public function create() 
    {
    Tag::create($request->all());

      return redirect('/admin/tags');
   }

   public function show($id) {
     return $id; 
   }

   public function edit($id){

      $tag = Tag::findOrFail($id);

      return view('vendor.backpack.base.tags.edit', compact('tag'));

    }

     public function store(Request $request) 
    {
      Tag::create($request->all());

      return redirect('/admin/tags');

    }

     public function update() 
    {
      $tag = Tag::findOrFail($id);

      $tag->update($request->all());

      return redirect('/admin/tags');

    }

     public function delete() 
    {
      Tag::findOrFail($id)->delete();

      return redirect('/admin/tags');

    }
}
