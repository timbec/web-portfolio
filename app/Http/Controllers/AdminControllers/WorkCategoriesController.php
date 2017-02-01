<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkCategory;

class WorkCategoriesController extends Controller
{
    
    public function index(){

      $work_categories = WorkCategory::all();

      return view('vendor.backpack.base.work-categories.index', compact('work_categories'));

   }

   public function store(Request $request){

      WorkCategory::create($request->all());

      return redirect('/admin/work-categories');
   }

   public function show($id) {
     return $id; 
   }

   public function edit($id){

      $work_category = WorkCategory::findOrFail($id);

      return view('vendor.backpack.base.work-categories.edit', compact('work_category'));
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
      $work_category = WorkCategory::findOrFail($id);

      $work_category->update($request->all());

      return redirect('/admin/work-categories');
   }

      /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
      WorkCategory::findOrFail($id)->delete();

      return redirect('/admin/work-categories');
   }
}
