<?php

namespace App\Repositories;

use App\Http\Requests\HookahClubRequest;
use App\Models\HookahClub;

class HookahClubRepository implements ApiHookahInterface
{

    /**
     * @param int $modelID
     * @return mixed
     */
    public function get(int $modelID)
    {
        return HookahClub::find($modelID);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return HookahClub::all();
    }


    public function createFromRequest(HookahClubRequest $hookahClubRequest)
    {
        HookahClub::create([
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    /**
     * @param int $modelID
     * @return mixed
     */
    public function delete(int $modelID)
    {
        return HookahClub::where('id', $modelID)->delete();
    }
}
