<?php

namespace Mediapiar\MovieAPI\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvancedMovieSearchResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'image' => $this->poster_path,
            'releaseYear' => date('Y', strtotime($this->release_date))
        ];    
    }
}
