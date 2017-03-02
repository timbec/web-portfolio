<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Photo;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag=null)
    {
        $posts = Post::paginate(5);

        return view('vendor.backpack.base.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $categories = Category::pluck('name', 'id')->all();
         $tags = Tag::pluck('name', 'id');

         return view('vendor.backpack.base.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreatePostRequest $request)
    {

      //return $request->all();

      $input = $request->all();

      $user = Auth::user();

      if($file = $request->file('photo_id')) {

         $name = time() . $file->getClientOriginalName();

         $file->move('photos', $name);
         $photo = Photo::create(['file'=>$name]);

         $input['photo_id'] = $photo->id;
      }

      $posts = $user->posts()->create($input);

      $posts->tags()->attach($request->input('tags')); 

      return redirect('/admin/posts');

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
       $post = Post::findOrFail($id);

       $categories = Category::pluck('name', 'id')->all();

       return view('vendor.backpack.base.posts.edit', compact('post', 'categories'));
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

      if($file = $request->file('photo_id')) {

         $name = time() . $file->getClientOriginalName();

         $file->move('photos', $name);
         $photo = Photo::create(['file'=>$name]);

         $input['photo_id'] = $photo->id;
      }

      Auth::user()->posts()->whereId($id)->first()->update($input);

      return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $post = Post::findOrFail($id);

      unlink(public_path() . $post->photo->file);

      $post->delete();

      return redirect('/admin/posts');
    }
}
