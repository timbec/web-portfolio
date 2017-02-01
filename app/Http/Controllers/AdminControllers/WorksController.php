<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Work;
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

         return view('vendor.backpack.base.works.create', compact( 'tags'));
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


      $works = $user->works()->create($input);

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
       $project = Project::findOrFail($id);

       $project_categories = ProjectCategory::pluck('name', 'id')->all();
       $skills = Skill::pluck('name', 'id');

       return view('vendor.backpack.base.projects.edit', compact('project', 'project_categories', 'skills'));
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

      Auth::user()->projects()->whereId($id)->first()->update($input);

      return redirect('/admin/projects');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $project = Project::findOrFail($id);

      unlink(public_path() . $project->thumbnail->file);

      $project->delete();

      return redirect('/admin/projects');
    }
}
