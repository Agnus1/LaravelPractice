<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarPartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $carPartsModels = [
            \App\Models\CarEngine::factory(),
            \App\Models\CarClass::factory(),
            \App\Models\CarBody::factory()
        ];
        foreach ($carPartsModels as $model) {
            $model->count(10)->create();
        }
    }
}
