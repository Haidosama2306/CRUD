<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserRepositoryInterface2
 * @package App\Repositories\Interfaces
 */
interface UserRepositoryInterface
{
    public function pagination(
        array $column=['*'],
        array $condition=[],
        int $perpage=0, 
        array $extend=[],
        array $orderBy=[]
    );

    public function create(array $payload =[]);
    public function findById(int $id, array $column=['*'], array $relation =[]);
}
