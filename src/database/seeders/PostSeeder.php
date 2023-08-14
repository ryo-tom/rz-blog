<?php

namespace Database\Seeders;

use App\Models\Post;
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

        // TODO: tags作成後にattachで紐付ける
    }
}
