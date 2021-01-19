<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\Ingredient;

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
        $salame = Ingredient::firstOrCreate([
            'name' => 'Salame'
        ]);

        $quesoParmensano = Ingredient::firstOrCreate([
            'name' => 'Queso parmesano'
        ]);

        $anchoas = Ingredient::firstOrCreate([
            'name' => 'Anchoas'
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
