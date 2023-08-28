<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'photo'=>$this->photo?asset('blogs/'.$this->photo):null,
            'category'=>$this->category_id?$this->category->title:null
        ];
        // return parent::toArray($request);
    }
}
