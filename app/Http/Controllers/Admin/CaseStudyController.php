<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $caseStudies = CaseStudies::paginate(5);

         return view('admin.case-studies.index', compact('caseStudies'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $project_categories = ProjectCategory::pluck('name', 'id')->all();

        return view('admin.case-studies.create', compact('project_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CaseStudiesCreateRequest $request)
    {
      $input = $request->all();
      $user = Auth::user();


      if($file = $request->file('thumbnail_id')) {

           $name = time() . $file->getClientOriginalName();
           $file->move('thumbnails', $name);

           $thumbnail = Thumbnail::create(['file' => $name]);

           $input['thumbnail_id'] = $thumbnail->id;
         }

        $user->casestudies()->create($input);

        return redirect('/admin/case-studies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
      $caseStudy = CaseStudy::findOrFail($id);

      $project_categories = ProjectCategory::pluck('name', 'id')->all();

      return view('admin.case-studies.edit', compact('caseStudy', 'project_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CaseStudyCreateRequest $request, $id)
    {
      $input = $request->all();

      if($file = $request->file('thumbnail_id')) {

          $name = time() . $file->getClientOriginalName();
          $file->move('thumbnails', $name);

          $thumbnail = Thumbnail::create(['file' => $name]);

          $input['thumbnail_id'] = $thumbnail->id;
      }

      Auth::user()->casestudies()->whereId($id)->first()->update($input);

      return redirect('/admin/case-studies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $caseStudy = CaseStudies::findOrFail($id);

      unlink(public_path() . $caseStudy->thumbnail->file);

      $caseStudy->delete();

      return redirect('/admin/case-studies');
    }

    /**
    * Display the Projects on public facing side.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function caseStudies()
    {
        $caseStudies = CaseStudies::paginate(12);

        return view('pages.home', compact('caseStudies'));

    }

    public function projectSingle($slug)
    {
      $caseStudy = CaseStudies::findBySlugOrFail($slug);

      return view('case-studies.single', compact('caseStudy'));
    }
}
