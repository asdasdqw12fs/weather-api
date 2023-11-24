<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'weather' => [
                'type' => $this->type,
                'temp' => $this->temp,
                'temp_min' => $this->temp_min,
                'temp_max' => $this->temp_max,
                'wind' => [
                    'speed' => $this->wind_speed
                ]
            ],
            'created_at' => $this->created_at
        ];
    }
}
