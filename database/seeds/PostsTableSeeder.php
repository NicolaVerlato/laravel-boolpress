<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {
            $new_post = new Post();
            $new_post->title = ucfirst($faker->words(rand(2, 8), true));
            $new_post->content = $faker->paragraphs(rand(5, 10), true);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->save();
        }
    }
}
