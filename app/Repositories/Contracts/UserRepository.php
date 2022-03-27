<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories\Contracts;
 */
interface UserRepository extends RepositoryInterface, BaseRepositoryContracts
{
    /**
     * Create new token for user.
     *
     * @param  User  $user
     *
     * @return string
     */
    public function generateToken(User $user): string;
}
