<?php


namespace App\Interfaces;


interface UserRepositoryInterface
{
    public function find(string $orderBy = '', string $sortBy = '');

    public function findOneById(int $id);

}