<?php

namespace App\Providers;

use App\Contracts\Likeable;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {

        Gate::define('admin', function (User $user) {
            return $user->is_admin == '1';
        });


        // $user->can('like', $post)
        Gate::define('like', function (User $user, Likeable $likeable) {
            if (!$likeable->exists) {
                return Response::deny("Cannot like an object that doesn't exists");
            }

            if ($user->hasLiked($likeable)) {
                return Response::deny("Cannot like the same thing twice");
            }

            return Response::allow();
        });

        // $user->can('unlike', $post)
        Gate::define('unlike', function (User $user, Likeable $likeable) {
            if (!$likeable->exists) {
                return Response::deny("Cannot unlike an object that doesn't exists");
            }

            if (!$user->hasLiked($likeable)) {
                return Response::deny("Cannot unlike without liking first");
            }

            return Response::allow();
        });

    }

}
