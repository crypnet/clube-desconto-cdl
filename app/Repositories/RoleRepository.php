<?php

namespace App\Repositories;

use App\Models\Role;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * getPaginate
     *
     * @param $page
     *
     * @return bool
     * @author Andre Luis
     */
    public function getPaginate($page)
    {
        $roles = Role::latest('id')->whereNotIn('name', hierarchy())->paginate($page);

        if (!count($roles)) {
            return false;
        }
        return $roles;
    }

    /**
     * getRoles
     *
     * @return bool
     * @author Andre Luis
     */
    public function getRoles()
    {
        $roles = Role::latest('id')->whereNotIn('name', hierarchy())->get();

        if (!count($roles)) {
            return false;
        }
        return $roles;
    }
}
