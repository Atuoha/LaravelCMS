<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Photo;
use App\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use \App\Http\Requests\PostEditRequest;
use \App\Http\Requests\PostRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        Session::flash('created_post', 'A new Post has been created. | Title: ' . $request->title . ' |');

        $user = Auth::user();
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['name'=>$name]);
            $file->move('images', $name);
            $input['photo_id'] = $photo->id;

        }

        $user->posts()->create($input);

        return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $users = User::all();
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'users','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request,  $id)
    {
        //  
            $user = User::findOrFail($id);

            if($request->user_id == ''){
                $input = $request->except('user_id');
            }elseif($request->category_id == ''){
                $input = $request->except('category_id');
            }else{
                $input  = $request->all();

            }

            if($file = $request->file('photo_id')){
                $name = time() . $file->getClientOriginalName();
                $photo = Photo::create(['name'=>$name]);
                unlink(public_path() . $user->photo);
                $file->move('images', $name);
                $input['photo_id'] = $photo->id;
            }

            $user->update($input);
            Session::flash('updated_post', 'A post was updated recently. | Title: '. $request->title .' |');

             return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $post = Post::findOrFail($id);

        unlink(public_path(). $post->photo);
        Session('deleted_post', 'Post has been deleted. | Title: '. $post->title.' |');

        $post->delete();
        return redirect('/admin/posts');

    }
}
