<?php

namespace App\Repositories;

interface HookahClubInterface
{
    /**
     * @param int $hookahClubID
     * @return mixed
     */
    public function get(int $hookahClubID);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int $hookahClubID
     * @return mixed
     */
    public function delete(int $hookahClubID);

    /**
     * @param $fields
     * @return mixed
     */
    public function create($fields);
}
