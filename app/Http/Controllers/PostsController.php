<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
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
        // return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts')   --- przyklad z uzyciem skladni sql
//        $posts = Post::orderBy('created_at','desc')->get();
        //$posts = Post::orderBy('created_at','desc')->take(1)->get();

        $title = 'Posty';
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.index') -> with('posts', $posts) -> with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nowy post';

        return view('posts.create') -> with('title','$title');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create Post
        $post = new Post;
        $post->title =$request ->input('title');
        $post->body = $request -> input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post dodany!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
        $title = $post ->title;

        return view('posts.show' )->with('post',$post)
            -> with('title',$title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edycja';
        $post = Post::find($id);
        return view('posts.edit') -> with('post',$post)
            -> with('title', $title);
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
        $this -> validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create Post
        $post = Post::find($id);
        $post->title =$request ->input('title');
        $post->body = $request -> input('body');


        $post->save();

        return redirect('/posts')->with('success', 'Post zaktualizowany!');

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
        return redirect('/posts') ->with('success', "Post usunięty!");
    }
}
