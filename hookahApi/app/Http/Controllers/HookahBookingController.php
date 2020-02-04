<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Repositories\HookahBookingInterface;

class HookahBookingController extends ApiController
{

    protected $repository;

    public function __construct(HookahBookingInterface $repository)
    {
        $this->repository = $repository;
    }


    public function book(BookingRequest $request)
    {
        try{
            $this->repository->create($request->only(['hookah_id', 'customer_name']));
            return $this->successResponse([],200);
        }
        catch (\Exception $exception){
            return $this->errorResponse($exception->getMessage(), 400);
        }
    }
}
