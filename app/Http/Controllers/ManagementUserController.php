<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManagementUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('admin/management_user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/management_user_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('username', '=', $request->username)->get();

        if(count($user) != 0) {
            return redirect(url('/admin/user/tambah'))->with('message', 'Username Sudah Terpakai'); 
        } else {
            User::insert([
                'name' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
            return redirect(url('/admin/user'));
        }
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
        $user = User::find($id);

        return view('admin/management_user_edit', compact('user'));
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
        $userSelf = User::find($id);

        $checkUser = User::where('username', '=', $request->username)->where('id', '!=', $id)->get();

        if(count($checkUser) != 0) {
            return redirect(url('/admin/user/edit/'.$id))->with('message', 'Username Sudah Terpakai'); 
        } else {
            if($request->password != null) {
                $passwordHash = Hash::make($request->password);
            } else {
                $passwordHash = $userSelf->password;
            }

            User::find($id)->update([
                'name' => $request->nama,
                'username' => $request->username,
                'password' => $passwordHash
            ]);
            return redirect(url('/admin/user'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect(url('/admin/user'));
    }
}
