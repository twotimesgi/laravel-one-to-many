<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) {
            $title = $faker->words(rand(2, 6), true);
            Post::create([
                'title'     => $title,
                'image'     => 'https://picsum.photos/id/'.rand(1, 1000).'/400/250',
                'content'   => $faker->text(rand(2000,5000)),
                'slug'      => Post::generateSlug($title)
            ]);
        }
    }
}
