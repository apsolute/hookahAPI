<?php

namespace App\Repositories;

interface HookahInterface
{
    /**
     * @param int $modelID
     * @return mixed
     */
    public function get(int $modelID);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int $modelID
     * @return mixed
     */
    public function delete(int $modelID);

    /**
     * @param $fields
     * @return mixed
     */
    public function create($fields);
}
