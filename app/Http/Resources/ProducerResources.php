<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProducerResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => 'Producer',
            'data' => $this->user,
            'attributes' => [
                'total_revenue' => $this->total_revenue,
                'total_sales' => $this->total_sales,
                'total_beats' => $this->total_beats,
                'profile_views' => $this->profile_views,
                'total_beats_sold' => $this->total_beats_sold,
                'created_at' => $this->created_at,

            ],
            'beats' => $this->beats

        ];
    }
}
