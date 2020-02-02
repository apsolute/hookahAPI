<?php

namespace App\Http\Controllers;

use App\Http\Requests\HookahClubRequest;
use App\Http\Resources\HookahClubResource;
use App\Models\HookahClub;
use App\Repositories\ApiHookahInterface;
use Illuminate\Http\Request;

class HookahClubController extends ApiController
{
    protected $repository;

    public function __construct(ApiHookahInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $hookahClubs = HookahClubResource::collection($this->repository->all());
            $this->successResponse($hookahClubs);
        }
        catch (\Exception $exception){
            $this->errorResponse($exception->getMessage(), 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HookahClubRequest $request)
    {
        if(!$request->validated())
            return $this->errorResponse($request->errors(), 404);


    }

    /**
     * @param HookahClub $hookahClub
     * @return HookahClubResource
     */
    public function show(HookahClub $hookahClub)
    {
        return new HookahClubResource($hookahClub);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        $this->successResponse(null, 204);
    }
}
