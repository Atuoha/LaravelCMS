<?php

namespace App\Http\Controllers;

use AddPhotoIdColumnToUser;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Category;
use App\User;
use App\Photo;
use App\CommentReply;


class AdminController extends Controller
{
    //

    public function index(){
        // $posts = Count(Post::all());
        // $categories = Count(Category::all());   // These methods are still okay!
        // $comments = Count(Comment::all());

            $posts = Post::count();
            $categories = Category::count();
            $comments = Comment::count();
            $replies = CommentReply::count();
            $photos = Photo::count();
            $users = User::count();

        return view('admin.index', compact('posts', 'categories', 'comments','replies', 'photos', 'users'));
    }
}
