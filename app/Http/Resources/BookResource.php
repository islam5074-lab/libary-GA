<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id"     => $this->id,
            "name"   => $this->name,
            "ISBN"   => $this->ISBN,
            "author" => $this->author,
            "category" => CategoryResource::make($this->whenLoaded("category")),
            // Task 9
            "is_available" => ! $this->borrowings()
                ->wherePivot("is_returned", false)
                ->exists(),
        ];
    }
}
