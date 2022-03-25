<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  User  $user
     *
     * @return void
     */
    public function creating(User $user)
    {
        $user->password = bcrypt($user->password);
    }
}
