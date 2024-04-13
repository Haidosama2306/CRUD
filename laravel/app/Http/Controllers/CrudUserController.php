<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Validation\ValidationException;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudUserController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authUser(Request $request)
    {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $credentials = $request->only('email','password');

            // đăng nhập với request vào bất kỳ vẫn nhận emial,password cố định
            // $credentials = ['email'=>'abc@mail.com','password'=>'123456'];

            if (Auth::attempt($credentials)) {

                return redirect()->intended('list')
                    ->withSuccess('Đăng nhập thành công');
            }
            return redirect("login")->withError('Đăng nhập thất bại');
    }

    public function createUser()
    {
        return view('auth.create');
    }

    public function postUser(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6',
            ]);

            $data = $request->all();
            $check = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);

            return redirect("login")->withSuccess('Tạo tài khoản thành công');
        } catch (ValidationException $e) {
            return redirect("create")->withError('Tạo tài khoản không thành công');
        }

    }

    public function readUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('auth.read', ['user' => $user]);
    }

    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('auth.update', ['user' => $user]);
    }

    public function postUpdateUser(Request $request)
    {
        try {
            $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

       $user = User::find($input['id']);
       $user->name = $input['name'];
       $user->email = $input['email'];
       $user->password = $input['password'];
       $user->save();

        return redirect("list")->withSuccess('Cập nhật thành công');
        } catch (ValidationException $e) {
            return redirect("list")->withError('Cập nhật không thành công');
        }

    }

    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('Đã xóa user '. $user_id);
    }

    public function listUser()
    {
        if(Auth::check()){
            $users = User::paginate(8);
            return view('auth.list', ['users' => $users])->with('i',(request()->input('page',1) -1) *5);
        }

        return redirect("login")->withError('Bạn cần phải đăng nhập');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login')->withSuccess('Đăng xuất thành công');
    }
}
