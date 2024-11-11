<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 100; $i++) { 
            Room::create([
                'typeRoom_idTypeRoom' => random_int(1,2),
                'number' => random_int(10, 200),
                'statusRoom' => 'Свободно',
            ])->save();
        }
        
    }
}
