<?php

namespace App\Repositories;

use App\Models\Permission;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PermissionRepository.
 *
 * @package namespace App\Repositories;
 */
class PermissionRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    public function getRolePermissionsArray($role)
    {
        return config('roles.models.role')::find($role);
    }

}
