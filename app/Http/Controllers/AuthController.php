<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $modelUser;
    function __construct()
    {
        $this->modelUser = new User();
    }
    function index()
    {

        return view('pages/auth/login');
    }
    function login(Request $req)
    {

        try {
            $remember = $req->remember ? true : false;
            $attempt = [
                'email' => $req->email,
                'password' => $req->password,
            ];
            if (Auth::attempt($attempt, $remember)) {

                return redirect(route('admin-home'));
            }
            throw new Exception('tài khoản hoạt mật khâu sai');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    function register(Request $req)
    {

        try {
            $user =  $this->modelUser->create([
                'email' => 'admin@example.com',
                'password' => '123',
                'name' => 'admin',
            ]);
            return response()->json($user);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
