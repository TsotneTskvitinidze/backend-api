<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "first_name"=> $this->first_name,
            "last_name"=> $this->last_name,
            "email"=> $this->email,
            "phone"=> $this->phone,
            "avatar"=> asset('images/students/' . $this->avatar, env('REDIRECT_HTTPS')),
            "identifier"=> $this->identifier,
            "college_id"=> $this -> college_id,
            "college"=> $this -> college,
            "groups"=> $this -> groups
        ];
    }
}
