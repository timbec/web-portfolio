<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    public function index(){

      $categories = Category::all();

      return view('vendor.backpack.base.categories.index', compact('categories'));

   }

   public function store(Request $request){

      Category::create($request->all());

      return redirect('/admin/categories');
   }

   public function edit($id){

      $category = Category::findOrFail($id);

      return view('vendor.backpack.base.categories.edit', compact('category'));
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
      $category = Category::findOrFail($id);

      $category->update($request->all());

      return redirect('/admin/categories');
   }

      /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
      Category::findOrFail($id)->delete();

      return redirect('/admin/categories');
   }
}
