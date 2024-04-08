<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Services\Interfaces\UserServiceInterface as UserService;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService){
        $this->userService=$userService;
    }

    public function indexLogin(){
        return view('Backend.auth.login');
    }

    public function login(AuthRequest $request){
        $credentials=['email'=>$request->input('email'), 'password'=>$request->input('password')];
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard.index')->with('success','Đăng nhập thành công');
        }
        else{
            return redirect()->route('auth.admin')->with('error','Email hoặc mật khẩu không chính xác');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login.admin');
    }
    public function indexRegister(){
        return view('Backend.auth.register');
    }
    public function create(CreateUserRequest $request){
        if($this->userService->createUser($request)){
            return redirect()->route('auth.login.admin')->with('success','Tạo tài khoàn thành công');
        }
           return redirect()->route('auth.register.admin')->with('error','Tạo tài khoản thất bại. Hãy thử lại');
    }
}
