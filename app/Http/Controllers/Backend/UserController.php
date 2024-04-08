<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    protected $userService;
    protected $userRepository;

    public function __construct(UserService $userService, UserRepository $userRepository){
        $this->userService=$userService;
        $this->userRepository=$userRepository;
    }
    public function index(Request $request){

        $template='Backend.user.user.index';

        $users = $this->userService->paginate($request);

        return view('Backend.dashboard.layout', compact('template','users'));
    }
    public function read($id){
        $template='Backend.user.user.edit';

        $config['method']='read';
        
        $user=$this->userRepository->findById($id);

        return view('Backend.dashboard.layout', compact('template','config','user'));
    }
    public function edit($id){
        $template='Backend.user.user.edit';

        $config['method']='update';
        
        $user=$this->userRepository->findById($id);

        return view('Backend.dashboard.layout', compact('template','config','user'));
    }
    public function update($id, UpdateUserRequest $request){
        if($this->userService->updateUser($id, $request)){
            return redirect()->route('user.index')->with('success','Cập nhật thành viên thành công');
        }
           return redirect()->route('user.index')->with('error','Cập nhật thành viên thất bại. Hãy thử lại');
    }
    public function destroy($id){
        $template='Backend.user.user.destroy';
        
        $user=$this->userRepository->findById($id);

        return view('Backend.dashboard.layout', compact('template','user'));
    }
    public function delete($id){
        if($this->userService->deleteUser($id)){
            return redirect()->route('user.index')->with('success','Xóa thành viên thành công');
        }
           return redirect()->route('user.index')->with('error','Xóa thành viên thất bại. Hãy thử lại');
    }
}
