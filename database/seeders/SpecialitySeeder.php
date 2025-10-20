<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialities = [
            'Cardiología',
            'Hematología',
            'Neurología',
            'Pediatría',
            'Dermatología',
            'Oncología',
            'Oftalmología',
            'Ginecología',
            'Traumatología',
            'Psicología'
        ];

        foreach ($specialities as $speciality) {
            Speciality::create([
                'name' => $speciality
            ]);
        }
    }
}
