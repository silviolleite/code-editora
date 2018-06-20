<?php

namespace App\Repositories;

use App\Criteria\CriteriaTrashedInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoryRepository.
 *
 * @package namespace App\Repositories;
 */
interface CategoryRepository extends RepositoryInterface, CriteriaTrashedInterface, RepositoryRestoreInterface
{
    public function listsWithMutators($column, $key = null);
}
