<?php

namespace App\Http\Resources\v2;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id'=> $this->id,
            'post_name'=>$this->tittle,
            'post_excerpt'=>$this->excerpt,
            'post_content'=>$this->content,
            'autor'=>[
                'name'=>$this->user->name,
                'email'=>$this->user->email
            ],
            'published_at'=>$this->created_at
        ];
    }
}
