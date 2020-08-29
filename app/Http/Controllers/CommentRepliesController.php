<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\CommentReply;
use App\Comment;
use Illuminate\Support\Facades\Auth;




class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $replies = CommentReply::all();
        return view('admin.comments.replies.index', compact('replies'));
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
    public function store(Request $request)
    {
        //

        $request->validate([
            'reply'=> 'required'
        ]);


        $user = Auth::user();
        $data = [
            'author'=>$user->name,
            'email'=>$user->email,
            'comment_id'=>$request->comment_id,
            'reply'=>$request->reply,
            'photo'=> $user->photo->name,
            'is_active'=> 0
        ];

        CommentReply::create($data);
        Session::flash('reply_created', 'Reply Submitted Succesfully');

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
        $comment  = Comment::findOrFail($id);
        return view('admin.comments.replies.create', compact('comment'));
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
        $reply = CommentReply::findOrFail($id);
        return view('admin.comments.replies.edit', compact('reply'));
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
        CommentReply::findOrFail($id)->update($request->all());

        Session::flash('reply_update', 'Reply successfully updated ): ');
        return redirect('admin/comment/replies');
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
        CommentReply::findOrFail($id)->delete();

        Session::flash('reply_delete', 'Reply successfully deleted ): ');
        return redirect('admin/comment/replies');
    }
}
