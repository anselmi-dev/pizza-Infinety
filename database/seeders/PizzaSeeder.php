<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\Ingredients;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  INGREDIENTES
        $salame = Ingredients::firstOrCreate([
            'name' => 'Salame',
            'price' => 10,
        ]);

        $quesoParmensano = Ingredients::firstOrCreate([
            'name' => 'Queso parmesano',
            'price' => 15,
        ]);

        $anchoas = Ingredients::firstOrCreate([
            'name' => 'Anchoas',
            'price' => 5
        ]);

        //  PIZZAS
        $pizza = Pizza::create([
            'name' => 'Pizza napolitana',
            'price' => 150,
        ]);

        $pizza->ingredients()->saveMany([
            $anchoas,
            $quesoParmensano
        ]);

        $pizza = Pizza::create([
            'name' => 'Pizza Margherita',
            'price' => 250,
        ]);

        $pizza->ingredients()->saveMany([
            $anchoas,
            $quesoParmensano,
            $salame
        ]);
    }
}
