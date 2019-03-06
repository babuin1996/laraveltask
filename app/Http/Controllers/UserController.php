<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use App\Role;
use App\RoleUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('read-user')){
            return response()->json(['title' => 'Access denied'], 403);
        }

        $users = User::all();

        return view('user/index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-user')){
            return response()->json(['title' => 'Access denied'], 403);
        }
        $roles = Role::all();

        return view('user/create')->with('roles', $roles);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('create-user')){
            return response()->json(['title' => 'Access denied'], 403);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $user->roles()->attach($request->input('role_id'));

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!auth()->user()->can('read-user')){
            return response()->json(['title' => 'Access denied'], 403);
        }

        $user = User::where('id', $id)->first();

        $role = Role::where('id', (DB::table('role_users')->where('user_id',$id)->first())->role_id)->first();

        return view('user/show')->with(['user' => $user, 'role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->can('update-user') || auth()->user()->id == $id){
            return response()->json(['title' => 'Access denied'], 403);
        }

        $user = User::where('id', '=', $id)->first();
        //echo '<pre>'; var_dump(DB::table('role_users')->where('user_id',$id)->get());die;
        $currentRole = Role::where('id', (DB::table('role_users')->where('user_id',$id)->first())->role_id)->first();
        $roles = Role::all();

        return view('user/update')->with(['user'=> $user, 'currentRole' => $currentRole, 'roles' => $roles]);
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
        if (!auth()->user()->can('update-user') || auth()->user()->id == $id) {
            return response()->json(['title' => 'Access denied'], 403);
        }

        $user = User::where('id', $id)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if (auth()->user()->isAdmin()) {
            $user->roles()->sync([$request->input('role_id')]);
        }
        $user->save();

        return redirect('users');
    }


    public function delete($id)
    {
        if(!auth()->user()->can('delete-user')){
            return response()->json(['title' => 'Access denied'], 403);
        }

        $user = User::where('id', '=', $id)->first();;

        return view('user/delete')->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->can('delete-user')){
            return response()->json(['title' => 'Access denied'], 403);
        }

        User::destroy($id);

        return redirect('users');
    }
}