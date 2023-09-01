<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtisteResource extends JsonResource
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
            'type' => 'Artiste',
            'data' => $this->user,
            'attributes' => [
                'total_beats_purchased' => $this->beats_purchased,
                'profile_views' => $this->profile_views,
                'total_amount_spent' => $this->total_amount_spent,
                'created_at' => $this->created_at,

            ],
            'purchased_beats' => [],
            'favourite_beats' => $this->favourites

        ];
    }
}