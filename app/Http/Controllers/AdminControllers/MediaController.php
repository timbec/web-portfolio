<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;

class MediaController extends Controller
{
  
    public function index(){

      $photos = Photo::all();

      return view('vendor.backpack.base.media.index', compact('photos'));
   }

   public function create(){

      return view('vendor.backpack.base.media.create');
   }

   public function store(Request $request){

      $file = $request->file('file');

      $name = time() . $file->getClientOriginalName();

      $file->move('photos', $name);

      Photo::create(['file'=>$name]);
   }

   public function destroy($id){

      $photo = Photo::findOrFail($id);

         unlink(public_path() . $photo->file);

         $photo->delete();

         return redirect('/admin/media');

   }
}
