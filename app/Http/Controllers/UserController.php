<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
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
        if(Auth::user()->perm_create == 0){die;}

        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->perm_create == 0){die;}

        User::insert(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'perm_create' => $request->input('permCreate'),
                'perm_read' => $request->input('permRead'),
                'perm_update' => $request->input('permUpdate'),
                'perm_delete' => $request->input('permDelete'),
            ]
        );

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
        if(Auth::user()->perm_read == 0){die;}

        $user = User::where('id', $id)->first();

        return view('user/show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->perm_update == 0){die;}

        $user = User::where('id', '=', $id)->first();;

        return view('user/update')->with('user', $user);
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
        if(Auth::user()->perm_update == 0){die;}

        $user = User::where('id', $id)->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->perm_create = $request->input('permCreate');
        $user->perm_read = $request->input('permRead');
        $user->perm_update = $request->input('permUpdate');
        $user->perm_delete = $request->input('permDelete');

        $user->save();

        return redirect('users');
    }


    public function delete($id)
    {
        if(Auth::user()->perm_delete == 0){die;}

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
        if(Auth::user()->perm_delete == 0){die;}

        User::destroy($id);

        return redirect('users');
    }
}