<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }
    public function actionlogin(Request $request)
    {
        $success = auth()->attempt([
            'username' => request('username'),
            'password' => request('password')
        ], request()->has('remember'));

        if($success) {
            return redirect()->to(url('/admin/kategori'));
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');

    }
}
