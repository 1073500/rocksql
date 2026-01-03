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
            'title' => 'Granite Rocks!',
            'name' => 'Granite',
            'type' => 'Igneous',
            'color' => 'Pink',
            'hardness' => '6-7',
            'category' => 'Plutonic',
            'description' => 'A common type of felsic intrusive igneous rock.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Mus%C3%A9um_de_Nantes_-_002_-_Granite_%28vari%C3%A9t%C3%A9_porphyro%C3%AFde%2C_Prades%2C_Hautes-Loire%2C_France%29.jpg/1199px-Mus%C3%A9um_de_Nantes_-_002_-_Granite_%28vari%C3%A9t%C3%A9_porphyro%C3%AFde%2C_Prades%2C_Hautes-Loire%2C_France%29.jpg?20211227180311',
            'user_id' => 1,
            'continent_id' => 4,
        ]);

        Rock::factory()->create([
            'title' => 'Basalt is Awesome!',
            'name' => 'Basalt',
            'type' => 'Igneous',
            'color' => 'Black',
            'hardness' => '6',
            'category' => 'Volcanic',
            'description' => 'A common extrusive igneous rock formed from the rapid cooling of basaltic lava.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Columnar-jointed_basalt_%28Columbia_River_Flood_Basalt%2C_Miocene%2C_~15-17_Ma%3B_Mud_Hollow%2C_Oregon%2C_USA%29_6.jpg/960px-Columnar-jointed_basalt_%28Columbia_River_Flood_Basalt%2C_Miocene%2C_~15-17_Ma%3B_Mud_Hollow%2C_Oregon%2C_USA%29_6.jpg?20231011154741',
            'user_id' => 2,
            'continent_id' => 5,
        ]);

        Rock::factory()->create([
            'title' => 'Limestone Wonders!',
            'name' => 'Limestone',
            'type' => 'Sedimentary',
            'color' => 'Gray',
            'hardness' => '3-4',
            'category' => 'Clastic',
            'description' => 'A sedimentary rock composed mainly of skeletal fragments of marine organisms.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7f/Ankeritic_carbonatite_%28Chilwa_Alkaline_Province%2C_Early_Cretaceous%2C_126_Ma%3B_Chilwa_Island%2C_Lake_Chilwa%2C_Malawi%2C_southeastern_Africa%29_1_%2825833642803%29.jpg/1200px-Ankeritic_carbonatite_%28Chilwa_Alkaline_Province%2C_Early_Cretaceous%2C_126_Ma%3B_Chilwa_Island%2C_Lake_Chilwa%2C_Malawi%2C_southeastern_Africa%29_1_%2825833642803%29.jpg?20191201085809',
            'user_id' => 1,
            'continent_id' => 1,
        ]);

        Rock::factory()->create([
            'title' => 'Amethyst Beauty!',
            'name' => 'Amethyst',
            'type' => 'Metamorphic',
            'color' => 'Purple',
            'hardness' => '7',
            'category' => 'Foliated',
            'description' => 'A violet variety of quartz often used in jewelry.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Raw_amethyst_crystals_1.jpg/1200px-Raw_amethyst_crystals_1.jpg?20241231213919',
            'user_id' => 2,
            'continent_id' => 3,
        ]);

        Rock::factory()->create([
            'title' => 'Jasper Gemstone!',
            'name' => 'Jasper',
            'type' => 'Sedimentary',
            'color' => 'Red',
            'hardness' => '6.5-7',
            'category' => 'Clastic',
            'description' => 'An opaque variety of chalcedony, often red, yellow, brown or green in color.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Specularite_with_quartz_and_jasper_%28GeoDIL_number_-_1321%29.jpg/1200px-Specularite_with_quartz_and_jasper_%28GeoDIL_number_-_1321%29.jpg?20250412161059',
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
