<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HookahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'name' => $this->name,
          'pipes_count' => $this->pipes_count,
          'hookahClub' => $this->hookahClub
        ];
    }
}
