<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!App::environment(['local', 'staging'])) {
            $this->command->info("本番環境の可能性があるためSeederの実行をスキップしました。");
            return;
        }

        Post::factory(100)->create();

        $tagIds = Tag::pluck('id');

        Post::all()->each(function ($post) use ($tagIds) {
            $post->tags()->attach(
                $tagIds->random(rand(1, 5))
            );
        });
    }
}
