<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagsList = ['Divertente', 'Raccappricciante', 'Spoiler', 'Importante', 'Interessante', 'Romantico'];

        foreach ($tagsList as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
