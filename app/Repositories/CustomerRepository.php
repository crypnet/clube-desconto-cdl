<?php

namespace App\Repositories;
use App\Models\Customer;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PermissionRepository.
 *
 * @package namespace App\Repositories;
 */
class CustomerRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }
}
