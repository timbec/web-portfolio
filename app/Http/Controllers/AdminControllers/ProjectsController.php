<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Project;
use App\Photo; 
use App\Thumbnail;
use App\ProjectCategory;



class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(3);

        return view('vendor.backpack.base.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $project_categories = ProjectCategory::pluck('name', 'id')->all();

         return view('vendor.backpack.base.projects.create', compact('project_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateProjectRequest $request)
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

      $user->projects()->create($input);

      return redirect('/admin/projects');

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

       return view('vendor.backpack.base.projects.edit', compact('project', 'project_categories'));
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
