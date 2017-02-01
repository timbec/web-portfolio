<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Work;
use App\Thumbnail; 
use App\WorkCategory; 
use App\Tag; 

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag=null)
    {
        $works = Work::paginate(3);

        return view('vendor.backpack.base.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource
     * 
     * @return [type]
     */
    public function create()
    {
         
         $tags = Tag::pluck('name', 'id'); 
         $work_categories = WorkCategory::pluck('name', 'id')->all(); 

         return view('vendor.backpack.base.works.create', compact( 'work_categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateWorkRequest $request)
    {

      //return $request->all();

      $input = $request->all(); 

      $user = Auth::user();

      if($file = $request->file('thumbnail_id')) {

         $name = time() . $file->getClientOriginalName();

         $file->move('thumbnails', $name);
         $thumbnail = Thumbnail::create(['file'=>$name]);

         $input['thumbnail_id'] = $thumbnail->id;
      }


      $works = $user->works()->create($input);
      //dd($works); 

      $works->tags()->attach($request->input('tags'));

      return redirect('/admin/works');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $work = Work::findOrFail($id);

       $work_categories = WorkCategory::pluck('name', 'id')->all();
       $tags = Tag::pluck('name', 'id');

       return view('vendor.backpack.base.works.edit', compact('work', 'work_categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $input = $request->all();

      if($file = $request->file('thumbnail_id')) {

         $name = time() . $file->getClientOriginalName();

         $file->move('thumbnails', $name);
         $thumbnail = Thumbnail::create(['file'=>$name]);

         $input['thumbnail_id'] = $thumbnail->id;
      }

      Auth::user()->works()->whereId($id)->first()->update($input);

      return redirect('/admin/works');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $work = Work::findOrFail($id);

      unlink(public_path() . $work->thumbnail->file);

      $work->delete();

      return redirect('/admin/works');
    }
}
