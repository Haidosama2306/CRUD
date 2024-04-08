<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository=$userRepository;
    }

    public function paginate($request){
        $condition['keyword']=addslashes($request->input('keyword'));
        $perpage=$request->integer('perpage', 5);
        $users=$this->userRepository->pagination(
            $this->paginateSelect(), 
            $condition, 
            $perpage, 
            ['path'=> 'user/index'],
            []
        );
        return $users;
    }
    public function createUser($request){
        DB::beginTransaction();
        try{
            $payload = $request->except('_token','send','repassword');
            $payload['password']=Hash::make($payload['password']);
            $user=$this->userRepository->create($payload);
            DB::commit();
            return true;
        }catch(\Exception $ex){
            DB::rollBack();
            echo $ex->getMessage();//die();
            return false;
        }
    }
    public function updateUser($id, $request){
        DB::beginTransaction();
        try{
            $user=$this->userRepository->findById($id);
            $payload = $request->except('_token','send','repassword');
            if($payload['password'] == null){
                $payload['password'] = $user->password;
            }else{
                $payload['password']=Hash::make($payload['password']);
            }                  
            $user=$this->userRepository->update($id, $payload);
            DB::commit();
            return true;
        }catch(\Exception $ex){
            DB::rollBack();
            echo $ex->getMessage();//die();
            return false;
        }
    }

    private function paginateSelect(){
        return [
            'id','email','phone','name','image'
        ];
    }
}
