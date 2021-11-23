<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Sequence;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect([
            'Легковые',
            'Внедорожники',
            'Раритетные',
            'Распродажа',
            'Новинки',
        ]);
        $subCategories = collect([
            ['Седаны', 1],
            ['Хетчбеки', 1],
            ['Универсалы', 1],
            ['Купе', 1],
            ['Родстеры', 1],
            ['Рамные', 2],
            ['Пикапы', 2],
            ['Кроссоверы', 2],
        ]);
        
        Category::factory()->count($categories->count())
                ->state(new Sequence(
                    function ($sequence) use ($categories) {
                            $name = $categories->get($sequence->index);
                            $attributes = [
                                'name' => $name,
                                'sort' => $sequence->index,
                                'slug' => Str::slug($name),
                            ]; 
                        return $attributes;
                }))->create();
                
        Category::factory()->count($subCategories->count())
                ->state(new Sequence(
                    function ($sequence) use ($subCategories) {
                        $subCategory = $subCategories->pull($sequence->index);
                        $name = $subCategory[0];
                        $parentId = $subCategory[1];
                        $attributes = [
                            'name' => $name,
                            'sort' => $sequence->index,
                            'parent_id' => $parentId,
                            'slug' => Str::slug($name),
                        ];
                        return $attributes;
                    }
                ))->create();
    }
}
