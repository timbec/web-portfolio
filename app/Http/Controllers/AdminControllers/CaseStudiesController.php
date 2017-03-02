<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\CaseStudy;
use App\Thumbnail;
use App\WorkCategory;
use App\Tag;

class CaseStudiesController extends Controller
{
    public function index(Tag $tag=null) {

         $casestudies = CaseStudy::paginate(3);

        return view('vendor.backpack.base.case-studies.index', compact('casestudies'));
    }

    public function create() {
        $work_categories = WorkCategory::pluck('name', 'id')->all();
        $tags = Tag::pluck('name', 'id');

        return view('vendor.backpack.base.case-studies.create', compact('work_categories', 'tags'));
    }

     public function store(Requests\CreateCaseStudyRequest $request) {
    
      //return $request->all();

      $input = $request->all();

      $user = Auth::user();

      if($file = $request->file('thumbnail_id')) {

         $name = time() . $file->getClientOriginalName();

         $file->move('thumbnails', $name);
         $thumbnail = Thumbnail::create(['file'=>$name]);

         $input['thumbnail_id'] = $thumbnail->id;
      }

      $case_studies = $user->casestudies()->create($input);

      $case_studies->tags()->attach($request->input('tags')); 

      return redirect('/admin/case-studies');
    }

     public function edit() {
        
        return 'to edit'; 
    }

     public function destroy() {
        
        return 'to delete'; 
    }
}
