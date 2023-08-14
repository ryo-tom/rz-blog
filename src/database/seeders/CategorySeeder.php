<?php

namespace Database\Seeders;

use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class CategorySeeder extends Seeder
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

        Category::factory(10)->create();
    }
}
