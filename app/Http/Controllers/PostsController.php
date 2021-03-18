<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::orderby('Name', 'asc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'profile-pic' => 'image|nullable|max:1999'
        ]);
        if($request->hasfile('profile-pic')){
            $fileNamewithExt = $request->file('profile-pic')->getClientOriginalName();
            //just fileName
            $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
            //just extension
            $extension = $request->file('profile-pic')->getClientOriginalExtension();
            //$fileStore
            $fileStore = $fileName.'_'.time().'.'.$extension;
            //upload
            $path = $request->file('profile-pic')->storeAs('public/profile_images', $fileStore);
        }else{
            $fileStore = 'no-image.jpg';
        }
        $post = new Post;
        $post->Name = $request->input('name');
        $post->age = $request->input('age');
        $post->profile_pic = $fileStore;
        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required'
        ]);
        $post = Post::find($id);
        $post->Name = $request->input('name');
        $post->age = $request->input('age');
        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::delete('public/profile_images/'.$post->profile_pic);
        $post->delete();
        return redirect('/posts');
    }
}
