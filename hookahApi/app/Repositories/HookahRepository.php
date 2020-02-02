<?php

namespace App\Repositories;

use App\Models\Hookah;

class HookahRepository implements ApiHookahInterface
{

    /**
     * @param int $modelID
     * @return mixed
     */
    public function get(int $modelID)
    {
        return Hookah::find($modelID);
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
}