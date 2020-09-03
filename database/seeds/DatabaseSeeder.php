<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class); 
        DB::statement('SET FOREIGN_KEY_CHECKS = 0 ');
        DB::table('users')->truncate();  //Removing all data
        DB::table('posts')->truncate();  //Removing all data
        DB::table('categories')->truncate();  //Removing all data
        DB::table('users')->truncate();  //Removing all data
        DB::table('comments')->truncate();  //Removing all data
        DB::table('comment_replies')->truncate();  //Removing all data



        factory(App\User::class, 10)->create()->each(function($user){

            $user->posts()->save(factory(App\Post::class)->make());

        });

        factory(App\Role::class, 3)->create();
        factory(App\Category::class, 6)->create();
        factory(App\Photo::class, 1)->create();


        factory(App\Comment::class, 10)->create()->each(function($comment){

            $comment->replies()->save(factory(App\CommentReply::class)->make());
        });


    }
}
