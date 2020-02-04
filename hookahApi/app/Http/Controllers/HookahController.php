<?php

namespace App\Http\Controllers;

use App\Http\Requests\HookahRequest;
use App\Http\Resources\HookahResource;
use App\Repositories\HookahInterface;
use App\Repositories\HookahRepository;
use Illuminate\Http\Request;

class HookahController extends ApiController
{
    protected $repository;

    public function __construct(HookahInterface $repository)
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
            $hookahClubs = HookahResource::collection($this->repository->all());
            return $this->successResponse($hookahClubs);
        }
        catch (\Exception $exception){
            $this->errorResponse($exception->getMessage(), 404);
        }
    }

    /**
     * @param HookahRequest $request
     * @return mixed
     */
    public function store(HookahRequest $request)
    {
        try{
            $hookah = $this->repository->create($request->only(['name', 'hookah_club_id', 'pipes_count']));
            return $this->successResponse(new HookahResource($hookah), 201);
        }
        catch (\Exception $exception){
            return $this->errorResponse($exception->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->successResponse(new HookahResource($this->repository->get($id)));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
