<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Category;
use App\Post;
use App\Tag;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function ($user) {

            factory(Category::class, 2)->create([
                'created_by' => $user->id,
            ])->each(function ($category) use ($user) {

                factory(Post::class, 10)->create([
                    'owner' => $user->email,
                    'category_id' => $category->id,
                ])->each(function($post){
                    $tags = factory(Tag::class, 3)->create();
                    $post->tags()->sync($tags);
                });

            });

        });

    }
}
