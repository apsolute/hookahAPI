<?php
namespace App\Repositories;

interface HookahBookingInterface
{
    /**
     * @param int $hookahBookingID
     * @return mixed
     */
    public function get(int $hookahBookingID);

    /**
     * @param $fields
     * @return mixed
     */
    public function create($fields);
}