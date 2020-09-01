<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        // $users = User::all()->orderBy('id','desc')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $role = Role::lists('name','id')->all();
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $input = $request->all();
         $input['password'] = Hash::make( $input['password']);

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['name'=>$name]);
            $file->move('images',$name);
            $input['photo_id'] = $photo->id;
        }

        User::create($input);
        Session::flash('created_user', 'A new user has been created. User: | '. $input['name'] .' |');

        return redirect('/admin/users');
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
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));

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
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = Hash::make( $input['password']);
        }
       
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['name'=>$name]);
            // unlink(public_path(). $user->photo->name);

            $file->move('images', $name);

            $input['photo_id'] = $photo->id;
        }


        $user->update($input);
        
        Session::flash('updated_user', 'A user has been updated. User: | '. $input['name'] .' |');

        return redirect('/admin/users');
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
        $user = User::findOrFail($id);
        Session::flash('deleted_user', 'A user has been deleted.  User: | '. $user->name .' |');

        unlink(public_path() . $user->photo->name);

        $user->delete();
        return redirect('/admin/users');
    }
}
