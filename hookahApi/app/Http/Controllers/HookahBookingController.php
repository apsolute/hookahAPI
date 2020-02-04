<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Resources\HookahBookingResource;
use App\Models\HookahBooking;
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

    public function findHookah()
    {

    }
}
