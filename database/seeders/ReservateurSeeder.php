<?php

namespace Database\Seeders;


use App\Models\Reservateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ReservateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservateur::factory(30)->create();
    }
}
