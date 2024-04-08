<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

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
}
