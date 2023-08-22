<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavouriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => strval($this->id),
            'type' => 'favourite_beat',
            'relationships' => [
                'user' => [
                    'id' => strval($this->user_id)
                ],
                'beat' => [
                    'id' => strval($this->beat_id)
                ]
            ]
        ];
    }
}
