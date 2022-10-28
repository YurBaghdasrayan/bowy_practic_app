<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $return = parent::toArray($request);
        $return += [
            'City' => $this->resource->City,
            'Region' => $this->resource->Region,
            'category' => $this->resource->category,
            'car' => $this->resource->car,
            "description" => $this->description,
            "body_type" => $this->body_type,
            "rudder" => $this->rudder,
            "year_of_issue" => $this->year_of_issue,
            "transmission" => $this->transmission,
            "status" => $this->status,
            "address" => $this->address,
            "Views" => count($this->resource->Views),
            "Call" => count($this->resource->Call),
            "image" => $this->resource->image
        ];
        return $return;
    }
}
