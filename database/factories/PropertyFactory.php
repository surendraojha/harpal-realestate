<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Property::class;

    public function definition()
    {
        return [
            'title'=>$this->faker->name,
            'date_of_build'=>'2053',
            'purpose_id'=>1,
            'view' => rand(0,1000000),
            'bedroom'=>rand(1,3),
            'bathroom'=>rand(1,3),
            'parking'=>$this->faker->paragraphs,
            'balcony'=>$this->faker->name,
            'water'=>$this->faker->name,
            'location_for_map'=>$this->faker->name,
            'overview'=>$this->faker->paragraphs(),
            'featured_photo'=>'220401083845.jpg',
            'featured_video'=>'https://www.youtube.com/watch?v=lh9HPzfJ1Uk',
            'price'=>rand(1000,5000000),
            'category_id' => 1,
                'sub_category_id'=>5,
                'user_id'=>1,
                'status'=>1,
                'floor_id'=>1,
                'road_size_id'=>1,
                'location_id'=>1,
                'expiration_date'=>'2022-09-22',
                'ad_id'=>$this->faker->name,
                'kitchen'=>rand(0,3),
                'furnishing'=>'furnished',
                'faced'=>'north',
                'contact_number'=>'9860347384',
                'area_covered'=>'110 SQ Metre',
                'buld_up_area'=>'130 SQ Metre',
                'price_negotiable'=>rand(0,1),
                'slug'=>rand(12342123,999999999)
        ];
    }
}
