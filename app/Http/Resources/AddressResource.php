<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'region'=>$this->region,
            'nas_pynkt'=>$this->nas_pynkt,
            'street'=>$this->street,
            'house'=>$this->house,
            'mail_index'=>$this->mail_index,

            //????????????
            //'user_id'=>$this->user_id,
            //'user_id'=>UserResource::collection($this->whenLoaded('user')),
            'user_id'=>UserResource::collection($this->user),
            //????????????

        ];
    }
}
