<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use App\Models\User;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name_project' => $this->name_project,
            'path_img' => $this->path_img,
            'project_url' => $this->project_url,
            'state' => $this->state,
            'reserved' => $this->reserved,
            'buy_term' => (Carbon::create($this->buy_term)->format('d'.'.'.'m'.'.'.'y')),

            'user' => new UserResource(User::findOrFail($this->user_id)),
        ];
    }
}
