<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Rock;
use App\Models\Continent;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //users

        User::factory()->create([
            'id' => 1,
            'name' => 'Rocky',
            'email' => 'rockyiii@hr.nl',
            'password' => Hash::make('Rootrootroot'),
            'created_at' => '2025-11-09 23:03:07',
            'is_admin' => 1,
        ]);

        User::factory()->create([
            'id' => 2,
            'name' => 'RockyIV',
            'email' => 'rockyiv@hr.nl',
            'password' => Hash::make('Rootrootroot'),
            'created_at' => '2025-11-10 10:15:00',
            'is_admin' => 0,
        ]);

        User::factory()->create([
            'id' => 3,
            'name' => 'BedrockVi',
            'email' => 'bedrockvi@hr.nl',
            'password' => Hash::make('Rootrootroot'),
            'created_at' => now(),
            'is_admin' => 0,
        ]);

        //continents

        Continent::factory()->createMany([
            ['name' => 'Africa'],
            ['name' => 'Antarctica'],
            ['name' => 'Asia'],
            ['name' => 'Europe'],
            ['name' => 'North America'],
            ['name' => 'Australia'],
            ['name' => 'South America'],
        ]);
// rocks
        Rock::factory()->create([
            'name' => 'Granite',
            'type' => 'Igneous',
            'color' => 'Pink',
            'hardness' => '6-7',
            'category' => 'Plutonic',
            'description' => 'A common type of felsic intrusive igneous rock.',
            'user_id' => 1,
            'continent_id' => 4,
        ]);

        Rock::factory()->create([
            'name' => 'Basalt',
            'type' => 'Igneous',
            'color' => 'Black',
            'hardness' => '6',
            'category' => 'Volcanic',
            'description' => 'A common extrusive igneous rock formed from the rapid cooling of basaltic lava.',
            'user_id' => 2,
            'continent_id' => 5,
        ]);

        Rock::factory()->create([
            'name' => 'Limestone',
            'type' => 'Sedimentary',
            'color' => 'Gray',
            'hardness' => '3-4',
            'category' => 'Clastic',
            'description' => 'A sedimentary rock composed mainly of skeletal fragments of marine organisms.',
            'user_id' => 1,
            'continent_id' => 1,
        ]);

        Rock::factory()->create([
            'name' => 'Amethyst',
            'type' => 'Metamorphic',
            'color' => 'Purple',
            'hardness' => '7',
            'category' => 'Foliated',
            'description' => 'A violet variety of quartz often used in jewelry.',
            'user_id' => 2,
            'continent_id' => 3,
        ]);

        Rock::factory()->create([
            'name' => 'Jasper',
            'type' => 'Sedimentary',
            'color' => 'Red',
            'hardness' => '6.5-7',
            'category' => 'Clastic',
            'description' => 'An opaque variety of chalcedony, often red, yellow, brown or green in color.',
            'user_id' => 3,
            'continent_id' => 6,
        ]);

        //comments

        Comment::factory()->create([
            'comment' => 'Amazing rock formation!',
            'user_id' => 2,
            'rock_id' => 1,
        ]);

        Comment::factory()->create([
            'comment' => 'I love the color of this rock.',
            'user_id' => 3,
            'rock_id' => 4,
        ]);

        Comment::factory()->create([
            'comment' => 'Very interesting description.',
            'user_id' => 1,
            'rock_id' => 2,
        ]);

    }
}
