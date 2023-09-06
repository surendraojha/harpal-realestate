<?php

namespace App\Http\Resources;

use App\Models\Municipality;
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
            'price'=>$this->price,
            'price_negotiable'=>$this->price_negotiable,
            'province'=>new ProvinceResource($this->province),
            'district'=>new DistrictResource($this->district),
            'municipality'=>new MunicipalityResource($this->municipality),
            'category'=>new CategoryResource($this->subcategory),
            'road_size'=>new RoadSizeResource($this->roadSize),
            'woda'=>new WodaResource($this->woda)
        ];
        // return parent::toArray($request);
    }
}
