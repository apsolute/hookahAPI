<?php

namespace App\Repositories;

use App\Models\Hookah;

class HookahRepository implements HookahInterface
{

    /**
     * @param int $modelID
     * @return mixed
     */
    public function get(int $hookahClubID)
    {
        return Hookah::find($hookahClubID);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return Hookah::all();
    }


    public function createFromRequest($request)
    {

    }

    /**
     * @param int $modelID
     * @return mixed
     */
    public function delete(int $modelID)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param $fields
     * @return mixed
     */
    public function create($fields)
    {
        // TODO: Implement create() method.
    }
}