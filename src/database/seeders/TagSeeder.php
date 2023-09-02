<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!App::environment(['local', 'staging'])) {
            $this->command->info("本番環境の可能性があるためSeederの実行をスキップします。");
            return;
        }

        $tags = [
            ['name' => 'PHP', 'slug' => 'php', 'sort_order' => 1, 'created_at' => now()],
            ['name' => 'Laravel', 'slug' => 'laravel', 'sort_order' => 2, 'created_at' => now()],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'sort_order' => 3, 'created_at' => now()],
            ['name' => 'HTML', 'slug' => 'html', 'sort_order' => 4, 'created_at' => now()],
            ['name' => 'CSS', 'slug' => 'css', 'sort_order' => 5, 'created_at' => now()],
        ];

        foreach ($tags as $tag) {
            Tag::updateOrCreate(
                ['name' => $tag['name']],
                $tag
            );
        }

        Tag::factory(5)->create();
    }
}
