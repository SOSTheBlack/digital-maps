<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Create new token for user.
     *
     * @param  User  $user
     *
     * @return string
     */
    public function generateToken(User $user): string
    {
        $accessToken = $user->createToken('auth_token')->plainTextToken;
        $user->setAttribute('token', $accessToken);

        return $accessToken;
    }
}
