<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\HookahFindRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\HookahBookingResource;
use App\Http\Resources\HookahResource;
use App\Repositories\HookahBookingInterface;

class HookahBookingController extends ApiController
{

    protected $repository;

    public function __construct(HookahBookingInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @param BookingRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function book(BookingRequest $request)
    {
        try{
            $book = $this->repository->create($request->validated());
            return $this->successResponse(new HookahBookingResource($book),200);
        }
        catch (\Exception $exception){
            return $this->errorResponse($exception->getMessage(), 400);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function customersList()
    {
        try{
            $books = $this->repository->getCustomers();
            return $this->successResponse(CustomerResource::collection($books),200);
        }
        catch (\Exception $exception){
            return $this->errorResponse($exception->getMessage(), 400);
        }
    }

    /**
     * @param HookahFindRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function findHookahs(HookahFindRequest $request)
    {
        try{
            $hookahs = $this->repository->findAvailableHookahs($request->validated());
            return $this->successResponse(HookahResource::collection($hookahs),200);
        }
        catch (\Exception $exception){
            return $this->errorResponse($exception->getMessage(), 400);
        }
    }
}
