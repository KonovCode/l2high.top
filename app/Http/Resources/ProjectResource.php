<?php

namespace App\Http\Resources;


use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
            [
            'id' => $this->id,
            'title' => $this->title,
            'rates' => $this->rates,
            'chronicles' => $this->chronicles,
            'date_open' => $this->date_open,
            'status' => $this->status,
            'status_term' => $this->status_term,
            'premium' => $this->premium,
            'premium_term' => $this->premium_term,
            'reserved' => $this->reserved,
            'obt' => $this->obt,

            'user' => new UserResource(User::findOrFail($this->user_id)),
            ];
    }

}
