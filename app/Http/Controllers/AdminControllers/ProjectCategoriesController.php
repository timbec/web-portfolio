<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProjectCategory;

class ProjectCategoriesController extends Controller
{
    public function index()
    {
      $project_categories = ProjectCategory::all();

     return view('vendor.backpack.base.project-categories.index', compact('project_categories'));
   }

   public function create()
   {
      ProjectCategory::create($request->all());

      return redirect('admin/project-categories');
   }

   public function edit($id)
   {
      $project_category = ProjectCategory::findOrFail($id);

     return view('vendor.backpack.base.project-categories.edit', compact('project_category'));

   }

   public function store(Request $request)
   {
      ProjectCategory::create($request->all());

      return redirect('admin/project-categories');
   }

   public function update(Request $request, $id)
   {
     $project_category = ProjectCategory::findOrFail($id);

     $project_category->update($request->all());

     return redirect('/admin/project-categories');
   }

   public function destroy($id)
   {
      ProjectCategory::findOrFail($id)->delete();

      return redirect('/admin/project-categories');
   }
}
