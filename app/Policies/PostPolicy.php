<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->is_admin
            || $user->groups->contains('name', 'Administrators')
            || ($user->groups->contains('name', 'Writers') && $user->groups->contains('name', 'Publishers'))){

            return true;
        }
        else{
            return Response::deny('You do not own this post.');
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        if ($user->is_admin
            || $user->groups->contains('name', 'Administrators')
            || ($user->groups->contains('name', 'Writers') && $user->groups->contains('name', 'Publishers'))
            || ($user->groups->contains('name', 'Writers') && $user->id === $post->user_id)){

            return true;
        }
        else{
            return Response::deny('You do not own this post.');
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        if ($user->is_admin
            || $user->groups->contains('name', 'Administrators')
            || ($user->groups->contains('name', 'Writers') && $user->groups->contains('name', 'Publishers'))){

            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        if ($user->is_admin
            || $user->groups->contains('Administrators')
            || ($user->groups->contains('Writers') && $user->groups->contains('Publishers'))){

            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        if ($user->is_admin
            || $user->groups->contains('Administrators')
            || ($user->groups->contains('Writers') && $user->groups->contains('Publishers'))){

            return true;
        }
        else{
            return false;
        }
    }
}
