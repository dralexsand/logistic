<?php

namespace Database\Seeders;

use App\Models\Transport;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $limit = 20;
        $i = 1;

        $transportData = [];

        while ($i < $limit) {
            $transportData[] = [
                'company' => $faker->company,
                'price' => round((rand(5000, 10000) / 10), 2),
                'coefficient' => round((rand(10, 99) / 10), 2),
            ];

            $i++;
        }

        Transport::insert($transportData);
    }
}
