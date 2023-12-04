<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Vote;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user= User::factory()->create([
            'id'=>2,
            'name'=> 'ali',
        ]);
        $category= Category::factory()->create([
            'id'=>2,
            // 'user_id'=>$user->id,
             'category'=>'sport',
        ]);
         Vote::factory(1)->create([
             'category_id'=>$category->id,
            'user_id'=>$user->id,
             'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. In, est itaque voluptatem amet, temporibus quo dolorum suscipit aliquid ipsam atque voluptate, molestiae optio ad ipsa ab! Cumque odio quo veniam velit deleniti excepturi sequi consectetur voluptatem, architecto aut error incidunt totam assumenda vero blanditiis eligendi. Dolorem, veritatis natus eaque esse suscipit voluptatum quibusdam nemo minima tenetur tempore laborum odio consectetur aliquid ipsam magnam sed eum possimus animi, expedita officia fugit beatae tempora placeat? Optio architecto aliquam commodi ea molestias dicta, quisquam soluta vitae velit incidunt, maxime impedit eos debitis unde ad saepe sed blanditiis eius at maiores adipisci. Aperiam, ab.
             ',
        ]);

    }
}
