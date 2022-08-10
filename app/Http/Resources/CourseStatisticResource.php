<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseStatisticResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => $this->coursePrice->price ?? 0,
            'earned' => 2,
            'enroll' => $this->enrollments->where("created_at", ">", \Carbon\Carbon::now()->firstOfMonth())->count(),
            "rating" => $this->comments->avg('rating')
        ];
    }
}
