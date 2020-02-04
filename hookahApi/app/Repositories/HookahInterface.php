<?php

namespace App\Repositories;

interface HookahInterface
{
    /**
     * @param int $hookahID
     * @return mixed
     */
    public function get(int $hookahID);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int $hookahID
     * @return mixed
     */
    public function delete(int $hookahID);

    /**
     * @param $fields
     * @return mixed
     */
    public function create($fields);
}
