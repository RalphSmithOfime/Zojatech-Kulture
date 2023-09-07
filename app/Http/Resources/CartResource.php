<?php

namespace App\Http\Resources;

use App\Models\Beat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Cart
 */


class CartResource extends JsonResource
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
                'user_id' => $this->user_id,
                'items' =>  $this->beatsDetails(),
                'total_price' => $this->total_price,
            ]
        ];
    }

    protected function beatsDetails()
    {
        $beats = [];
        foreach ($this->items as $beat_id) {
            $beat = Beat::find($beat_id);
            if ($beat) {
                array_push($beats, [
                    'id' => $beat->id,
                    'name' => $beat->name,
                    'price' => $beat->price,
                    'genre' => $beat->genre,
                    'image_url' => $beat->imageUrl,
                ])  ;
            }
        }
         return $beats;
    }
}
