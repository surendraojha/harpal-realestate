<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'ad_id'=>$this->ad_id,
            'title'=>$this->title,
            'overview'=>$this->overview,
            'custom_fields'=>$this->custom_fields,
            'featured_photo'=>$this->featured_photo?asset('uploads/'.$this->featured_photo):null,
            'photos'=> PropertyPhotoResource::collection($this->photo),
            'features'=> PropertyFeatureResource::collection($this->propertyFeature),

        ];
        // return parent::toArray($request);
    }
}
