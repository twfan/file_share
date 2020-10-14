<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        return view('user.index', compact('users'));
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
        $newUser = $request->all();
        
        if($newUser['role']=="Admin"){
            $newUser['role'] = 1;
        }else{
            $newUser['role'] = 0;
        }
        // dd($newUser);
        if(empty($request->id)){
            $newUser['password'] = Hash::make($request->password);
            User::create([
                'name' => $newUser['username'],
                'email' => "",
                'password' => $newUser['password'],
                'is_admin' => $newUser['role'],
            ]);
        }else{
            $updateUser = User::find($request->id);
            $updateUser->is_admin = $newUser['role'];
            $updateUser->save();
        }
       return redirect()->route('admin.user.index');
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
        $userToEdit = \App\User::findOrFail($id);
        return $userToEdit;
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
        $user->delete();
        return redirect()->route('admin.user.index')->with('status', 'Category successfully moved to trash');
    }

    public function changePassword(Request $request)
    {
        // dd($request->id);

        $newUser['password'] = Hash::make($request->password);
        $updateUser = User::find($request->id);
        // dd($updateUser);
        $updateUser->password = $newUser['password'];
        $updateUser->save();
        return redirect()->route('login');
    }
}
