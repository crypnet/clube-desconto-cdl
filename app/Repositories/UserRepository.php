<?php

namespace App\Repositories;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PermissionRepository.
 *
 * @package namespace App\Repositories;
 */
class UserRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}
