<?php

namespace App\Repositories;

use App\Models\Hookah;
use App\Models\HookahClub;

class HookahClubRepository implements HookahClubInterface
{

    /**
     * @param int $hookahClubID
     * @return mixed
     */
    public function get(int $hookahClubID)
    {
        return HookahClub::findOrFail($hookahClubID);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return HookahClub::all();
    }

    /**
     * @param int $hookahClubID
     * @return mixed
     */
    public function delete(int $hookahClubID)
    {
        return HookahClub::where('id', $hookahClubID)->delete();
    }

    /**
     * @param $fields
     * @return mixed
     */
    public function create($fields)
    {
        return HookahClub::create($fields);
    }
}