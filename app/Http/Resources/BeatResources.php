<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *  @mixin \App\Models\Beat */

class BeatResources extends JsonResource
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
                'price' => $this->price,
                'genre' => $this->genre,
                'image_url' => $this->imageUrl,
                'file_url' => $this->fileUrl,
                'duration' => $this->duration,
                'size' => $this->size,
                'type' => $this->type,
                'user_id' => $this->user_id,
                'total_sales' => $this->total_sales,
                'licence_type' => $this->license_type,
                'avaliable_copies' => $this->available_copies,
                'plays' => $this->play_count,
                'views' => $this->view_count,
                'likes' => $this->like_count,
                'downloads' => $this->download_count,
            ],


            'producer' => $this->producer,
        ];
    }
}
