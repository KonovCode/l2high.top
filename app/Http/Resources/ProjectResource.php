<?php

namespace App\Http\Resources;

use App\Models\User;
use Carbon\Carbon;
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
            'date_open' => (Carbon::create($this->date_open)->format('d'.'.'.'m'.'.'.'y')),
            'status' => $this->status,
            'status_term' => $this->status_term,
            'premium' => $this->premium,
            'premium_term' => $this->premium_term,
            'state_project' => $this->state_project,
            'obt' => $this->obt,

            'user' => new UserResource(User::findOrFail($this->user_id)),
            ];
    }

}
