<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function create($attributes = []);
    public function update($id, $attributes = []);
    public function delete($id);
}