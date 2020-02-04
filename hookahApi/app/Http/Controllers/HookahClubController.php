<?php

namespace App\Http\Controllers;

use App\Http\Requests\HookahClubRequest;
use App\Http\Resources\HookahClubResource;
use App\Repositories\HookahClubInterface;

class HookahClubController extends ApiController
{
    protected $repository;

    public function __construct(HookahClubInterface $repository)
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
            return $this->successResponse($hookahClubs);
        }
        catch (\Exception $exception){
            $this->errorResponse($exception->getMessage(), 404);
        }
    }

    /**
     * @param HookahClubRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(HookahClubRequest $request)
    {
        try{
            $hookahClub = $this->repository->create($request->validated());
            return $this->successResponse(new HookahClubResource($hookahClub), 201);
        }
        catch (\Exception $exception){
            return $this->errorResponse($exception->getMessage(), 400);
        }

    }

    /**
     * @param $id
     * @return HookahClubResource
     */
    public function show($id)
    {
        return $this->successResponse(new HookahClubResource($this->repository->get($id)));
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
        return $this->successResponse(null, 204);
    }
}
