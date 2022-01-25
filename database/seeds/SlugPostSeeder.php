<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SlugPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postList = Post::all();

        foreach ($postList as $post) {
            $counter = 1;

            $slug = Str::slug($post->title);

            $exists = Post::where('slug', $slug)->first();
            while ($exists) {
                $slugNew = $slug . '-' . $counter;
                $exists = Post::where('slug', $slugNew)->first();
                $counter++;
                if (!$exists) {
                    $slug = $slugNew;
                }
            }

            $post->slug = $slug;
            $post->save();
            
        }

    }
}
