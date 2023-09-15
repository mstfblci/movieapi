<?php

namespace Mediapiar\MovieAPI\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MoviesDatabaseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->titleText?->text,
            'image' => $this->primaryImage?->url,
            'releaseYear' => $this->releaseDate?->year
        ];    
    }
}
