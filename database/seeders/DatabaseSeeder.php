<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Hardness;
use App\Models\Rock;
use App\Models\Continent;
use App\Models\Type;
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
            'profile_picture' => 'profile_pictures/8y5Br5sIxgjWWMzg6YOKoTYNSPqb4yO4g4rAccaW.jpg',
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

        //types
        Type::factory()->createMany([
            ['type' => 'Igneous'],
            ['type' => 'Sedimentary'],
            ['type' => 'Metamorphic'],
        ]);

        //colors
        Color::factory()->createMany([
            ['color' => 'Red'],
            ['color' => 'Orange'],
            ['color' => 'Yellow'],
            ['color' => 'Green'],
            ['color' => 'Blue'],
            ['color' => 'Purple'],
            ['color' => 'Pink'],
            ['color' => 'Brown'],
            ['color' => 'Black'],
            ['color' => 'Gray'],
            ['color' => 'White'],
        ]);
        //hardness
        Hardness::factory()->createMany([
            ['hardness' => 1],
            ['hardness' => 2],
            ['hardness' => 3],
            ['hardness' => 4],
            ['hardness' => 5],
            ['hardness' => 6],
            ['hardness' => 7],
            ['hardness' => 8],
            ['hardness' => 9],
            ['hardness' => 10],
        ]);

        //categories
        Category::factory()->createMany([
            ['category' => 'Plutonic'],
            ['category' => 'Volcanic'],
            ['category' => 'Clastic'],
            ['category' => 'Chemical'],
            ['category' => 'Foliated'],
            ['category' => 'Non-Foliated'],
            ['category' => 'Mineral'],
        ]);

// rocks
        Rock::factory()->create([
            'title' => 'Granite Rocks!',
            'name' => 'Granite',
            'type_id' => 1,
            'color_id' => 7,
            'hardness_id' => 7,
            'category_id' => 1,
            'description' => 'A common type of felsic intrusive igneous rock.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Mus%C3%A9um_de_Nantes_-_002_-_Granite_%28vari%C3%A9t%C3%A9_porphyro%C3%AFde%2C_Prades%2C_Hautes-Loire%2C_France%29.jpg/1199px-Mus%C3%A9um_de_Nantes_-_002_-_Granite_%28vari%C3%A9t%C3%A9_porphyro%C3%AFde%2C_Prades%2C_Hautes-Loire%2C_France%29.jpg?20211227180311',
            'user_id' => 1,
            'continent_id' => 4,
        ]);

        Rock::factory()->create([
            'title' => 'Basalt is Awesome!',
            'name' => 'Basalt',
            'type_id' => 1,
            'color_id' => 9,
            'hardness_id' => 6,
            'category_id' => 2,
            'description' => 'A common extrusive igneous rock formed from the rapid cooling of basaltic lava.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Columnar-jointed_basalt_%28Columbia_River_Flood_Basalt%2C_Miocene%2C_~15-17_Ma%3B_Mud_Hollow%2C_Oregon%2C_USA%29_6.jpg/960px-Columnar-jointed_basalt_%28Columbia_River_Flood_Basalt%2C_Miocene%2C_~15-17_Ma%3B_Mud_Hollow%2C_Oregon%2C_USA%29_6.jpg?20231011154741',
            'user_id' => 2,
            'continent_id' => 5,
        ]);

        Rock::factory()->create([
            'title' => 'Limestone Wonders!',
            'name' => 'Limestone',
            'type_id' => 2,
            'color_id' => 10,
            'hardness_id' => 4,
            'category_id' => 3,
            'description' => 'A sedimentary rock composed mainly of skeletal fragments of marine organisms.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7f/Ankeritic_carbonatite_%28Chilwa_Alkaline_Province%2C_Early_Cretaceous%2C_126_Ma%3B_Chilwa_Island%2C_Lake_Chilwa%2C_Malawi%2C_southeastern_Africa%29_1_%2825833642803%29.jpg/1200px-Ankeritic_carbonatite_%28Chilwa_Alkaline_Province%2C_Early_Cretaceous%2C_126_Ma%3B_Chilwa_Island%2C_Lake_Chilwa%2C_Malawi%2C_southeastern_Africa%29_1_%2825833642803%29.jpg?20191201085809',
            'user_id' => 1,
            'continent_id' => 1,
        ]);

        Rock::factory()->create([
            'title' => 'Amethyst Beauty!',
            'name' => 'Amethyst',
            'type_id' => 3,
            'color_id' => 6,
            'hardness_id' => 7,
            'category_id' => 5,
            'description' => 'A violet variety of quartz often used in jewelry.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Raw_amethyst_crystals_1.jpg/1200px-Raw_amethyst_crystals_1.jpg?20241231213919',
            'user_id' => 2,
            'continent_id' => 3,
        ]);

        Rock::factory()->create([
            'title' => 'Jasper Gemstone!',
            'name' => 'Jasper',
            'type_id' => 2,
            'color_id' => 6,
            'hardness_id' => 4,
            'category_id' => 3,
            'description' => 'An opaque variety of chalcedony, often red, yellow, brown or green in color.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Specularite_with_quartz_and_jasper_%28GeoDIL_number_-_1321%29.jpg/1200px-Specularite_with_quartz_and_jasper_%28GeoDIL_number_-_1321%29.jpg?20250412161059',
            'user_id' => 3,
            'continent_id' => 6,
        ]);

        Rock::factory()->create([
            'title' => 'Look at this!',
            'name' => 'Tenorite and Malachite',
            'type_id' => 2,
            'color_id' => 4,
            'hardness_id' => 4,
            'category_id' => 7,
            'description' => 'Look at this mixed Malachite from Egypt!',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Tenorite_and_Malachite_02.jpg/640px-Tenorite_and_Malachite_02.jpg',
            'user_id' => 2,
            'continent_id' => 1,
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
