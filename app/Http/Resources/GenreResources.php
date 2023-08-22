<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *  @mixin \App\Models\Genre */

class GenreResources extends JsonResource
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
            'attributes' => [
                'name' => $this->name,
                'total_beats' => $this->beats->count(),
                'total_plays' => $this->total_plays,
                'total_downloads' => $this->total_downloads,
                'total_uploads' => $this->total_uploads,
            ],

            'beats' => $this->beats,
        ];
    }
}
