<?php

namespace App\Repositories;

use App\Models\Hookah;

class HookahRepository implements HookahInterface
{

    /**
     * @param int $hookahID
     * @return mixed
     */
    public function get(int $hookahID)
    {
        return Hookah::findOrFail($hookahID);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return Hookah::all();
    }

    /**
     * @param int $hookahID
     * @return mixed
     */
    public function delete(int $hookahID)
    {
        return Hookah::findOrFail($hookahID)->delete();
    }

    /**
     * @param $fields
     * @return mixed
     */
    public function create($fields)
    {
        return Hookah::create($fields);
    }
}