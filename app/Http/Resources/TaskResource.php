<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'title' => $this->title,
            'status' => $this->status,
            'user_id' => $this->user_id,
            // if you want to include the user data, you can use:
            // 'user' => new UserResource($this->whenLoaded('user')),
            // you needto show timestamps
            // 'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            // 'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            // or you can use the default
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
