<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ApiHookahInterface
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
     * @param Request $request
     * @return mixed
     */
    public function createFromRequest(Request $request);

    /**
     * @param int $modelID
     * @return mixed
     */
    public function delete(int $modelID);
}
