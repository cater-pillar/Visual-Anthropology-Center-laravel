<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('galleries')->insert(['title' => 'Our Space', 
                                        'cover' => 'images/ourSpace/15.jpg',
                                        'description' => '',
                                        'slug' => 'our-space']);
        DB::table('galleries')->insert(['title' => 'Fieldwork', 
                                        'cover' => 'images/Fieldwork/3.jpg',
                                        'description' => '',
                                        'slug' => 'fieldwork']); 
        DB::table('galleries')->insert(['title' => 'School <br> of <br> Visual Anthropology VI', 
                                        'cover' => 'images/schoolOfVisualAnthropology6/13.jpg',
                                        'description' => '',
                                        'slug' => 'sva-6']); 
        DB::table('galleries')->insert(['title' => 'School <br> of <br> Visual Anthropology VII', 
                                        'cover' => 'images/schoolOfVisualAnthropology7/19.jpg',
                                        'description' => '',
                                        'slug' => 'sva-7']); 



        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/1.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/2.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/3.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/4.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/5.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/6.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/7.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/8.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/9.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/10.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/11.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/12.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/13.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/14.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/15.jpg',
                                        ]); 
        DB::table('slides')->insert(['gallery_id' => 1, 
                                        'photo' => 'images/ourSpace/16.jpg',
                                        ]); 


        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password!'),
            'is_admin' => true,
        ]);

        $this->call([
            ProgramSeeder::class,
            TabSeeder::class,
        ]);


    }
}
