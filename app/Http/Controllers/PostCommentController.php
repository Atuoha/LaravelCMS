<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Session;
use App\Comment;
use App\Post;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        //
        $user = Auth::user();
        $data = [
            'post_id'=> $request->post_id,
            'author'=> $user->name,
            'body'=> $request->body,
            'email'=> $user->email,
            'is_active'=> 0,
            'photo'=> $user->photo->name
        ];
        Comment::create($data);
        Session::flash('comment_create', 'Your comment has been submitted and it\'s waiting moderartion. | '. Auth::user()->name .' |');

        return redirect()->back();
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
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('admin.comments.show', compact('comments','post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        Comment::findOrFail($id)->update($request->all());
        Session::flash('comment_update', 'Comment updated successfully');
        
        return redirect('admin/comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Comment::findOrFail($id)->delete();
        Session::flash('comment_delete', 'Comment deleted successfully');
        
        return redirect('admin/comments');
    }

    public function replies($id){

        $comment = Comment::findOrFail($id);
        $comment_replies = $comment->replies;

        return view('admin.comments.comment_replies', compact('comment_replies','comment'));
    }
}
