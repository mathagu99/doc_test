<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //use of eloquent
use DB;

class PostsController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/

public function index()
{
$posts = Post::all();
return view('posts.index')->with($posts);

} 
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    return view('posts.create');
}

/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
       {
           $this->validate($request, [
               'title' => 'required',
               'body'  =>'required'
           ]);
           //post creation
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/readPosts')->with('success', 'Post Created');
  
        }

/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

public function show()
{
   $posts = Post::orderBy('title','desc')->get()->first();
   //dd($posts);
   return view('posts.show')->with('post',$posts);
}

/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $post = Post::find($id);
    return view('posts.edit')->with('post', $post);
}

/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param int $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    $this->validate($request, [
        'title' => 'required',
        'body'  =>'required'
    ]);
    //post creation
 $post = Post::find($id);
 $post->title = $request->input('title');
 $post->body = $request->input('body');
 $post->save();

 return redirect('/readPosts')->with('success', 'Post Updated');

}

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$post = Post::find($id);
$post->delete();
return redirect('/readPosts')->with('success', 'Post Removed');
}

//new method to read posts
public function readPosts()
{
  
  // $posts = DB::select('SELECT * FROM posts');
  // $posts = Post:: orderBy('title','desc')->take(1)->get();
  //$posts = Post:: orderBy('title','desc')->get();

  $posts = Post::orderBy('created_at','desc')->paginate(10);
   return view('posts.index')->with('posts', $posts); 
}

//method show

 public function showPosts($id)
{
    $post = Post::find($id);
    return view('posts.show')->with('post', $post);
}

//method edit
public function editPosts($id)
{
    $post = Post::find($id);
    return view('posts.edit')->with('post', $post);
}


}