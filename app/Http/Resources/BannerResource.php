<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

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
            'img' => $this->img,
            'url' => $this->url,
            'reserved' => $this->reserved,
            'buy_term' =>  (Carbon::create($this->buy_term)->format('d'.'.'.'m'.'.'.'y')),
        ];
    }
}
