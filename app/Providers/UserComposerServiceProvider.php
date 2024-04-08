<?php

namespace App\Providers;

use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

class UserComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repositories\Interfaces\UserRepositoryInterface','App\Repositories\UserRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('Backend.dashboard.component.nav', function($view){
            $userRepository=$this->app->make(UserRepository::class);
            $user_id=Auth::id();
            $user_name=$userRepository->findById($user_id,['name']);
            $view->with('user_name',$user_name);
        });
    }
}
