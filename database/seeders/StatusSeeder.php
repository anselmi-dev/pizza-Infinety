<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizza = Status::createMany([
            ['name' => 'pending'],
            ['name' => 'sending'],
            ['name' => 'delivered'],
            ['name' => 'cancel']
        ]);
    }
}
